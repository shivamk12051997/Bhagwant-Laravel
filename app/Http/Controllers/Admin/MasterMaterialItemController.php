<?php

namespace App\Http\Controllers\Admin;

use App\Models\MaterialItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasterMaterialItemController extends Controller
{
    public function index()
    {
        return view('admin.master.material_item.index');
    }
    public function datatable()
    {
        $material_item = MaterialItem::latest()->get();
        return view('admin.master.material_item.datatable', compact('material_item'));
    }

    public function insert(Request $request)
    {
        if(MaterialItem::whereNotIn('id',[$request->id])->where('name',$request->name)->where('deleted_at',null)->first()){
            return 0;
        }else{
            $input = $request->all();
            if($request->id == 0){
                $input['created_by_id'] = auth()->user()->id;
            }
            $input['status'] = $request->status ?? 0;

            $material_item = MaterialItem::updateOrCreate(['id' => $input['id']],$input);

            return $material_item;
        }
    }

    public function edit($id)
    {
        $material_item = MaterialItem::find($id);
        return view('admin.master.material_item.ajax_edit', compact('material_item'));
    }

    public function delete($id)
    {
        $material_item = MaterialItem::find($id);
        $material_item->delete();

        return redirect()->back()->with('danger','Material Item Deleted Successfully');
    }
    public function status($id)
    {
        $material_item = MaterialItem::find($id);
        if($material_item->status == 1){
            $material_item->status = 0;
        }else{
            $material_item->status = 1;
        }
        $material_item->update();

        return $material_item->status;
    }
}
