<?php

namespace App\Http\Controllers\Admin;

use App\Models\LotNo;
use App\Models\Challan;
use Illuminate\Http\Request;
use App\Models\LotNoActivity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class LotNoController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.lot_no.index' ,compact('request'));
    }
    public function datatable(Request $request)
    {
        $numbers = 50;
        if($request->value){
            $numbers = $request->value;
        }
        $lot_no = LotNo::orderBy('id','desc');
        if(($request->status ?? '') != 'All'){
            $lot_no = $lot_no->where('status', $request->status);
        }
        if(($request->page_name ?? '') != 'All'){
            $lot_no = $lot_no->where('is_complete', ($request->page_name == 'Complete' ? 1 : 0));
        }
        if(($request->lot_no_from ?? '') != ''){
            $lot_no = $lot_no->where('lot_no', '>=', $request->lot_no_from);
        }
        if(($request->lot_no_to ?? '') != ''){
            $lot_no = $lot_no->where('lot_no', '<=', $request->lot_no_to);
        }
        if($request->search){
            $allColumnNames = Schema::getColumnListing((new LotNo)->getTable());
            $columnNames = array_filter($allColumnNames, fn($columnName) => !in_array($columnName, ['created_at', 'updated_at', 'id']));
            $lot_no = LotNo::where(function ($query) use($columnNames, $request) {
                foreach ($columnNames as $index => $column) {
                    $method = $index === 0 ? 'where' : 'orWhere';
                    $query->$method($column, 'LIKE', "%{$request->search}%");
                }
            });
        }
       
        $lot_no = $lot_no->orderBy('id','desc')->paginate($numbers);
        // $lot_no = LotNo::where('deleted_at', null)->latest()->get();
        return view('admin.lot_no.datatable', compact('lot_no'));
    }

    public function insert(Request $request)
    {
        if(LotNo::whereNotIn('id',[$request->id])->where('lot_no',$request->lot_no)->where('deleted_at',null)->first()){
            return 0;
        }else{
            $input = $request->all();
            if($request->id == 0){
                $input['created_by_id'] = auth()->user()->id;
                $input['status'] = 'Cutting';
            }
            $lot_no = LotNo::updateOrCreate(['id' => $input['id']],$input);

            $input['lot_no_id'] = $lot_no->id;
            $input['total_earning'] = ($lot_no->pcs * $request->price);

            $lot_activity = LotNoActivity::updateOrCreate(['lot_no_id' => $input['lot_no_id'],'action' => 'Cutting'],$input);

            return $lot_no;
        }
    }

    public function edit($id)
    {
        $lot_no = LotNo::find($id);
        return view('admin.lot_no.ajax_edit', compact('lot_no'));
    }

    public function delete($id)
    {
        $lot_no = LotNo::find($id);
        LotNoActivity::where('lot_no_id',$lot_no->id)->delete();
        $lot_no->delete();

        return redirect()->back()->with('danger','Lot No Deleted Successfully');
    }

    public function show($id)
    {
        $lot_no = LotNo::find($id);
        return view('admin.lot_no.show', compact('lot_no'));
    }
    public function activity(Request $request)
    {
        $lot_no = LotNo::find($request->lot_no_id);
        $lot_activity = LotNoActivity::find($request->lot_activity_id);
        return view('admin.lot_no.activity_ajax_edit', compact('lot_no','lot_activity'));
    }
    public function activity_delete($id)
    {
        $lot_activity = LotNoActivity::find($id);
        $lot_activity->delete();
        
        $lot_no = LotNo::find($lot_activity->lot_no_id);
        $lot_no->status = $lot_no->last_activity->action;
        $lot_no->save();

        return redirect()->back()->with('danger','Lot No Activity Deleted Successfully');
    }
    public function activity_insert(Request $request)
    {
        $input =  $request->all();
        $lot_no = LotNo::find($request->lot_no_id);
        if($request->id == 0){
            $input['created_by_id'] = auth()->user()->id;
            $lot_no->status = $request->action;
        }else{
            $lot_no->status = $lot_no->last_activity->action;
        }
        $lot_no->is_complete = $lot_no->status == 'Packing' || $lot_no->status == 'Received From Party' ? 1 : 0;
        $lot_no->save();
        $input['pcs'] = $lot_no->pcs;
        $input['total_earning'] = ($lot_no->pcs * $request->price);

        $lot_activity = LotNoActivity::updateOrCreate(['id' => $input['id']],$input);
        
        return $lot_activity;
    }
    public function multiple_delete(Request $request)
    {
        $input =  $request->all();

        foreach ($request->lot_no_id as $key => $id) {
            $lot_no = LotNo::find($id);
            $challan_ids = LotNoActivity::where('lot_no_id',$id)->where('challan_id','!=',null)->groupBy('challan_id')->get()->pluck('challan_id')->toArray();
            Challan::whereIn('id',$challan_ids)->delete();
            LotNoActivity::where('lot_no_id',$lot_no->id)->delete();
            $lot_no->delete();
        }

        return redirect()->back()->with('danger','Lot No Deleted Successfully');
    }
}
