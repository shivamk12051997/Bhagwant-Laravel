<?php

namespace App\Http\Controllers\Admin;

use App\Models\Worker;
use Illuminate\Http\Request;
use App\Models\LotNoActivity;
use App\Models\PaymentHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

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
            $input['role'] = json_encode($request->role ?? []);
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

    public function worker_salary()
    {
        return view('admin.worker_salary.index');
    }

    public function worker_salary_datatable(Request $request)
    {
        $numbers = 50;
        if($request->value){
            $numbers = $request->value;
        }
        $worker = Worker::orderBy('id','desc');
        if($request->search){
            $allColumnNames = Schema::getColumnListing((new Worker)->getTable());
            $columnNames = array_filter($allColumnNames, fn($columnName) => !in_array($columnName, ['created_at', 'updated_at', 'id']));
            $worker = Worker::where(function ($query) use($columnNames, $request) {
                foreach ($columnNames as $index => $column) {
                    $method = $index === 0 ? 'where' : 'orWhere';
                    $query->$method($column, 'LIKE', "%{$request->search}%");
                }
            });
        }
        $worker = $worker->orderBy('id','desc')->paginate($numbers);
        // $worker = LotNo::where('deleted_at', null)->latest()->get();
        return view('admin.worker_salary.datatable', compact('worker', 'request'));
    }
    public function worker_salary_show(Request $request, $worker_id)
    {
        $worker = Worker::find($worker_id);
        $lot_activity = LotNoActivity::whereDate('created_at','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->whereDate('created_at','<=',($request->to_date ?? date('Y-m-d')))->where('worker_id',$worker_id)->orderBy('id','desc')->get();
        // $lot_activity_with_trashed = LotNoActivity::whereDate('created_at','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->whereDate('created_at','<=',($request->to_date ?? date('Y-m-d')))->where('worker_id',$worker_id)->orderBy('id','desc')->where('is_paid','1')->where('deleted_at','!=',null)->withTrashed()->get();
        // $payment_history = PaymentHistory::whereDate('created_at','>=',($request->from_date ?? date('Y-m-d', strtotime('-1 month'))))->whereDate('created_at','<=',($request->to_date ?? date('Y-m-d')))->where('worker_id',$worker_id)->orderBy('id','desc')->get();
        $lot_activity_with_trashed = LotNoActivity::where('worker_id',$worker_id)->orderBy('id','desc')->where('is_paid','1')->where('deleted_at','!=',null)->withTrashed()->get();
        $payment_history = PaymentHistory::where('worker_id',$worker_id)->orderBy('id','desc')->get();

        return view('admin.worker_salary.show', compact('worker','lot_activity', 'lot_activity_with_trashed' ,'request', 'payment_history'));
    }
    public function lot_activity_is_paid(Request $request)
    {
        if(($request->is_paid ?? '') != ''){
            foreach (LotNoActivity::whereIn('id',$request->lot_no_activity_id)->get() as $key => $item) {
                $item->is_paid = $request->is_paid;
                $item->save();
            }
        }
        return redirect()->back()->with('success','Is Paid Updated Successfully');
    }
}
