<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasterColorController extends Controller
{
    public function index()
    {
        return view('admin.master.color.index');
    }
    public function datatable()
    {
        $color = Color::latest()->get();
        return view('admin.master.color.datatable', compact('color'));
    }

    public function insert(Request $request)
    {
        if(Color::whereNotIn('id',[$request->id])->where('name',$request->name)->where('deleted_at',null)->first()){
            return 0;
        }else{
            $input = $request->all();
            if($request->id == 0){
                $input['created_by_id'] = auth()->user()->id;
            }
            $input['status'] = $request->status ?? 0;

            $color = Color::updateOrCreate(['id' => $input['id']],$input);

            return $color;
        }
    }

    public function edit($id)
    {
        $color = Color::find($id);
        return view('admin.master.color.ajax_edit', compact('color'));
    }

    public function delete($id)
    {
        $color = Color::find($id);
        $color->delete();

        return redirect()->back()->with('danger','Color Deleted Successfully');
    }
    public function status($id)
    {
        $color = Color::find($id);
        if($color->status == 1){
            $color->status = 0;
        }else{
            $color->status = 1;
        }
        $color->update();

        return $color->status;
    }
}
