<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class PaymentHistoryController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.payment_history.index' ,compact('request'));
    }
    public function datatable(Request $request)
    {
        $numbers = 50;
        if($request->value){
            $numbers = $request->value;
        }
        $payment_history = PaymentHistory::orderBy('id','desc');
        if(($request->status ?? '') != 'All'){
            $payment_history = $payment_history->where('status', $request->status);
        }
        if($request->search){
            $allColumnNames = Schema::getColumnListing((new PaymentHistory)->getTable());
            $columnNames = array_filter($allColumnNames, fn($columnName) => !in_array($columnName, ['created_at', 'updated_at', 'id']));
            $payment_history = PaymentHistory::where(function ($query) use($columnNames, $request) {
                foreach ($columnNames as $index => $column) {
                    $method = $index === 0 ? 'where' : 'orWhere';
                    $query->$method($column, 'LIKE', "%{$request->search}%");
                }
            });
        }
       
        $payment_history = $payment_history->orderBy('id','desc')->paginate($numbers);
        // $payment_history = PaymentHistory::where('deleted_at', null)->latest()->get();
        return view('admin.payment_history.datatable', compact('payment_history'));
    }

    public function insert(Request $request)
    {
        $input = $request->all();
        $input['created_by_id'] = auth()->user()->id;
        
        $payment_history = PaymentHistory::updateOrCreate(['id' => $input['id']],$input);

        return redirect()->back()->with('success','Payment History Saved Successfully');
    }

    public function edit($id)
    {
        $payment_history = PaymentHistory::find($id);
        return view('admin.payment_history.ajax_edit', compact('payment_history'));
    }

    public function delete($id)
    {
        $payment_history = PaymentHistory::find($id);
        $payment_history->delete();

        return redirect()->back()->with('danger','Payment History Deleted Successfully');
    }
}
