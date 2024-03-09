<?php

namespace App\Http\Controllers\Admin;

use App\Models\Worker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasterWorkerController extends Controller
{
    public function index()
    {
        return view('admin.master.worker.index');
    }
    public function datatable()
    {
        $worker = Worker::latest()->get();
        return view('admin.master.worker.datatable', compact('worker'));
    }

    public function insert(Request $request)
    {
        if(Worker::whereNotIn('id',[$request->id])->where('name',$request->name)->where('deleted_at',null)->first()){
            return 0;
        }else{
            $input = $request->all();
            if($request->id == 0){
                $input['created_by_id'] = auth()->user()->id;
            }
            $input['status'] = $request->status ?? 0;

            $worker = Worker::updateOrCreate(['id' => $input['id']],$input);

            return $worker;
        }
    }

    public function edit($id)
    {
        $worker = Worker::find($id);
        return view('admin.master.worker.ajax_edit', compact('worker'));
    }

    public function delete($id)
    {
        $worker = Worker::find($id);
        $worker->delete();

        return redirect()->back()->with('danger','Worker Deleted Successfully');
    }
    public function status($id)
    {
        $worker = Worker::find($id);
        if($worker->status == 1){
            $worker->status = 0;
        }else{
            $worker->status = 1;
        }
        $worker->update();

        return $worker->status;
    }
}
