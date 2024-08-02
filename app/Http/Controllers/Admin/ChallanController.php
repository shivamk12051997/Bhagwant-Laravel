<?php

namespace App\Http\Controllers\Admin;

use App\Models\LotNo;
use App\Models\Challan;
use Illuminate\Http\Request;
use App\Models\LotNoActivity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class ChallanController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.challan.index' ,compact('request'));
    }
    public function datatable(Request $request)
    {
        $numbers = 50;
        if($request->value){
            $numbers = $request->value;
        }
        $challan = Challan::orderBy('id','desc');

        if(($request->in_out ?? '') != ''){
            $challan = $challan->where('in_out', $request->in_out);
        }
        if(($request->from_date ?? '') != ''){
            $challan = $challan->where('date', '>=', $request->from_date);
        }
        if(($request->to_date ?? '') != ''){
            $challan = $challan->where('date', '<=', $request->to_date);
        }
        if($request->search){
            $allColumnNames = Schema::getColumnListing((new Challan)->getTable());
            $columnNames = array_filter($allColumnNames, fn($columnName) => !in_array($columnName, ['created_at', 'updated_at', 'id']));
            $challan = Challan::where(function ($query) use($columnNames, $request) {
                foreach ($columnNames as $index => $column) {
                    $method = $index === 0 ? 'where' : 'orWhere';
                    $query->$method($column, 'LIKE', "%{$request->search}%");
                }
            });
        }
       
        $challan = $challan->orderBy('id','desc')->paginate($numbers);
        // $challan = Challan::where('deleted_at', null)->latest()->get();
        return view('admin.challan.datatable', compact('challan', 'request'));
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        $input['created_by_id'] = auth()->user()->id;
        $input['lot_no_ids'] = json_encode($request->lot_no_ids ?? []);

        $challan = Challan::updateOrCreate(['id' => $input['id']],$input);

        $ids = [];
        foreach ($request->lot_no_ids as $key => $lot_no_id) {
            $lot_no = LotNo::find($lot_no_id);
            if($request->in_out == 'Out'){
                $lot_no->status = 'Send To Party';
            }else{
                $lot_no->status = 'Received From Party';
                $lot_no->is_complete = 1;
            }
            $lot_no->save();

            $value['created_by_id'] = auth()->user()->id;
            $value['lot_no_id'] = $lot_no->id;
            $value['challan_id'] = ($challan->id ?? 0);
            $value['challan_out_id'] = ($challan->id ?? 0);
            $value['action'] = $lot_no->status;
            $value['date'] = $request->date;
            $value['pcs'] = $lot_no->pcs;
            $value['price'] = $request->price;
            $value['total_earning'] = ($lot_no->pcs * $request->price);
            $value['embroidery_action'] = 'Out Source';
            $value['party_id'] = $request->party_id;
            $value['remarks'] = $request->remarks;

            $ids[] = LotNoActivity::updateOrCreate(['challan_id' => $value['challan_id'], 'lot_no_id' => $value['lot_no_id']], $value)->id;
        }

        if($deleted_lot_activity = LotNoActivity::where('challan_id', $challan->id)->whereNotIn('id', $ids)->get())
        {
            foreach ($deleted_lot_activity as $key => $lot_activity) 
            {
                $lot_activity->delete();
                
                $lot_no = LotNo::find($lot_activity->lot_no_id);
                $lot_no->status = $lot_no->last_activity->action;
                $lot_no->save();
            }
        }

        return $challan;
    }
    public function challan_in_insert(Request $request)
    {
        // dd($request->all());
        $input = $request->all();
        $input['created_by_id'] = auth()->user()->id;
        $input['lot_no_ids'] = json_encode($request->lot_no_ids ?? []);

        $challan = Challan::updateOrCreate(['id' => $input['id']],$input);

        $ids = [];
        foreach ($request->lot_no as $key => $item) {
            // dd($item);
            $lot_no = LotNo::find($item['lot_no_id']);
            if($request->in_out == 'Out'){
                $lot_no->status = 'Send To Party';
            }else{
                if($lot_no->pcs == ($item['received_pcs'] + LotNoActivity::where('action','Received From Party')->where('lot_no_id', $lot_no->id)->sum('pcs'))){
                    $lot_no->is_complete = 1;
                    $lot_no->status = 'Received From Party';
                    $challan->status = 1;
                    $challan->save();
                }else{
                    $lot_no->status = 'Received From Party';
                    $lot_no->is_complete = null;
                }
            }
            $lot_no->save();

            $value['created_by_id'] = auth()->user()->id;
            $value['lot_no_id'] = $lot_no->id;
            $value['challan_id'] = ($challan->id ?? 0);
            $value['challan_out_id'] = ($request->challan_out_id ?? 0);
            $value['challan_in_id'] = ($challan->id ?? 0);
            $value['action'] = 'Received From Party';
            $value['date'] = $request->date;
            $value['pcs'] = $item['received_pcs'];
            $value['price'] = $request->price;
            $value['total_earning'] = ($item['received_pcs'] * $request->price);
            $value['embroidery_action'] = 'Out Source';
            $value['party_id'] = $request->party_id;
            $value['remarks'] = $request->remarks;

            $ids[] = LotNoActivity::updateOrCreate(['challan_id' => $value['challan_id'], 'lot_no_id' => $value['lot_no_id']], $value)->id;
        }

        if($deleted_lot_activity = LotNoActivity::where('challan_id', $challan->id)->whereNotIn('id', $ids)->get())
        {
            foreach ($deleted_lot_activity as $key => $lot_activity) 
            {
                $lot_activity->delete();
                
                $lot_no = LotNo::find($lot_activity->lot_no_id);
                $lot_no->status = $lot_no->last_activity->action;
                $lot_no->save();
            }
        }

        return redirect()->back()->with('success','Challan In Added Successfully');
    }

    public function edit(Request $request, $id)
    {
        $challan = Challan::find($id);
        if($request->in_out == 'In'){
            return view('admin.challan.challan_in_ajax_edit', compact('challan','request'));
        }else{
            return view('admin.challan.ajax_edit', compact('challan','request'));
        }
    }

    public function delete($id)
    {
        $challan = Challan::find($id);
        $challan->delete();

        return redirect()->back()->with('danger','Challan Deleted Successfully');
    }

    public function show($id)
    {
        $challan = Challan::find($id);
        return view('admin.challan.show', compact('challan'));
    }
}
