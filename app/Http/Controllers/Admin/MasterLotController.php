<?php

namespace App\Http\Controllers\Admin;

use App\Models\MasterLot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class MasterLotController extends Controller
{
    public function index()
    {
        return view('admin.master.master_lot.index');
    }
    public function datatable(Request $request)
    {
        $numbers = 50;
        if($request->value){
            $numbers = $request->value;
        }
        $master_lot = MasterLot::orderBy('id','asc');
        if($request->search){
            $allColumnNames = Schema::getColumnListing((new MasterLot)->getTable());
            $columnNames = array_filter($allColumnNames, fn($columnName) => !in_array($columnName, ['created_at', 'updated_at', 'id']));
            $master_lot = $master_lot->where(function ($query) use($columnNames, $request) {
                foreach ($columnNames as $index => $column) {
                    $method = $index === 0 ? 'where' : 'orWhere';
                    $query->$method($column, 'LIKE', "%{$request->search}%");
                }
            });
        }
        
        $master_lot = $master_lot->orderBy('from','asc')->paginate($numbers);
        return view('admin.master.master_lot.datatable', compact('master_lot'));
    }

    public function insert(Request $request)
    {
        if (MasterLot::where('from', '<=', $request->from)->where('to', '>=', $request->from)->whereNotIn('id', [$request->id])->where('deleted_at', null)->first()) {
            return 0;
        } else {
            $input = $request->all();

            $input['created_by_id'] = auth()->user()->id;
            $input['size_ids'] = json_encode($request->size_ids ?? []);

            $master_lot = MasterLot::updateOrCreate(['id' => $input['id']],$input);

            return $master_lot;
        }
    }

    public function edit($id)
    {
        $master_lot = MasterLot::find($id);
        return view('admin.master.master_lot.ajax_edit', compact('master_lot'));
    }

    public function delete($id)
    {
        $master_lot = MasterLot::find($id);
        $master_lot->delete();

        return redirect()->back()->with('danger','Master Lot Deleted Successfully');
    }
}
