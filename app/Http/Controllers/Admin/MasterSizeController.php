<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasterSizeController extends Controller
{
    public function index()
    {
        return view('admin.master.size.index');
    }
    public function datatable()
    {
        $size = Size::latest()->get();
        return view('admin.master.size.datatable', compact('size'));
    }

    public function insert(Request $request)
    {
        if(Size::whereNotIn('id',[$request->id])->where('name',$request->name)->where('deleted_at',null)->first()){
            return 0;
        }else{
            $input = $request->all();
            if($request->id == 0){
                $input['created_by_id'] = auth()->user()->id;
            }
            $input['status'] = $request->status ?? 0;

            $size = Size::updateOrCreate(['id' => $input['id']],$input);

            return $size;
        }
    }

    public function edit($id)
    {
        $size = Size::find($id);
        return view('admin.master.size.ajax_edit', compact('size'));
    }

    public function delete($id)
    {
        $size = Size::find($id);
        $size->delete();

        return redirect()->back()->with('danger','Size Deleted Successfully');
    }
    public function status($id)
    {
        $size = Size::find($id);
        if($size->status == 1){
            $size->status = 0;
        }else{
            $size->status = 1;
        }
        $size->update();

        return $size->status;
    }
}
