<?php

namespace App\Http\Controllers\Admin;

use App\Models\Party;
use Illuminate\Http\Request;
use App\Models\LotNoActivity;
use App\Models\PaymentHistory;
use App\Models\MaterialChallan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class MasterPartyController extends Controller
{
    public function index()
    {
        return view('admin.master.party.index');
    }
    public function datatable()
    {
        $party = Party::latest()->get();
        return view('admin.master.party.datatable', compact('party'));
    }

    public function insert(Request $request)
    {
        if(Party::whereNotIn('id',[$request->id])->where('name',$request->name)->where('deleted_at',null)->first()){
            return 0;
        }else{
            $input = $request->all();
            if($request->id == 0){
                $input['created_by_id'] = auth()->user()->id;
            }
            $input['role'] = json_encode($request->role ?? []);
            $input['status'] = $request->status ?? 0;

            $party = Party::updateOrCreate(['id' => $input['id']],$input);
            $party->party_code = 'P-000'.$party->id;
            $party->update();

            return $party;
        }
    }

    public function edit($id)
    {
        $party = Party::find($id);
        return view('admin.master.party.ajax_edit', compact('party'));
    }

    public function delete($id)
    {
        $party = Party::find($id);
        $party->delete();

        return redirect()->back()->with('danger','Party Deleted Successfully');
    }
    public function status($id)
    {
        $party = Party::find($id);
        if($party->status == 1){
            $party->status = 0; 
        }else{
            $party->status = 1;
        }
        $party->update();

        return $party->status;
    }

    public function party_salary()
    {
        return view('admin.party_salary.index');
    }

    public function party_salary_datatable(Request $request)
    {
        $numbers = 50;
        if($request->value){
            $numbers = $request->value;
        }
        $party = Party::orderBy('id','desc');
        if($request->search){
            $allColumnNames = Schema::getColumnListing((new Party)->getTable());
            $columnNames = array_filter($allColumnNames, fn($columnName) => !in_array($columnName, ['created_at', 'updated_at', 'id']));
            $party = Party::where(function ($query) use($columnNames, $request) {
                foreach ($columnNames as $index => $column) {
                    $method = $index === 0 ? 'where' : 'orWhere';
                    $query->$method($column, 'LIKE', "%{$request->search}%");
                }
            });
        }
        $party = $party->orderBy('id','desc')->paginate($numbers);
        // $party = LotNo::where('deleted_at', null)->latest()->get();
        return view('admin.party_salary.datatable', compact('party', 'request'));
    }
    
    public function party_salary_show(Request $request, $party_id)
    {
        $party = Party::find($party_id);
        $lot_activity = LotNoActivity::whereDate('created_at','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->whereDate('created_at','<=',($request->to_date ?? date('Y-m-d')))->where('party_id',$party_id)->orderBy('id','desc')->get();
        $lot_activity_with_trashed = LotNoActivity::whereDate('created_at','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->whereDate('created_at','<=',($request->to_date ?? date('Y-m-d')))->where('party_id',$party_id)->orderBy('id','desc')->where('is_paid','1')->where('deleted_at','!=',null)->withTrashed()->get();
        $payment_history = PaymentHistory::whereDate('created_at','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->whereDate('created_at','<=',($request->to_date ?? date('Y-m-d')))->where('party_id',$party_id)->orderBy('id','desc')->get();
        $material_challan = MaterialChallan::whereDate('created_at','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->whereDate('created_at','<=',($request->to_date ?? date('Y-m-d')))->where('party_id', $party_id)->orderBy('id','desc')->get();

        return view('admin.party_salary.show', compact('party','lot_activity', 'lot_activity_with_trashed' ,'request', 'payment_history', 'material_challan'));
    }
}
