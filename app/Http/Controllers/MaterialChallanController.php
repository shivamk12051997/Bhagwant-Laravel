<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaterialChallan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class MaterialChallanController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.material_challan.index' ,compact('request'));
    }
    public function datatable(Request $request)
    {
        $numbers = 50;
        if($request->value){
            $numbers = $request->value;
        }
        $material_challan = MaterialChallan::orderBy('id','desc');
     
        if(($request->from_date ?? '') != ''){
            $material_challan = $material_challan->where('created_at', '>=', $request->from_date);
        }
        if(($request->to_date ?? '') != ''){
            $material_challan = $material_challan->where('created_at', '<=', $request->to_date);
        }
        if($request->search){
            $allColumnNames = Schema::getColumnListing((new MaterialChallan)->getTable());
            $columnNames = array_filter($allColumnNames, fn($columnName) => !in_array($columnName, ['created_at', 'updated_at', 'id']));
            $material_challan = MaterialChallan::where(function ($query) use($columnNames, $request) {
                foreach ($columnNames as $index => $column) {
                    $method = $index === 0 ? 'where' : 'orWhere';
                    $query->$method($column, 'LIKE', "%{$request->search}%");
                }
            });
        }
       
        $material_challan = $material_challan->orderBy('id','desc')->paginate($numbers);
        // $material_challan = MaterialChallan::where('deleted_at', null)->latest()->get();
        return view('admin.material_challan.datatable', compact('material_challan'));
    }

    public function insert(Request $request)
    {
        $input = $request->all();
        $input['created_by_id'] = auth()->user()->id;
        
        $material_challan = MaterialChallan::updateOrCreate(['id' => $input['id']],$input);

        return $material_challan;
    }

    public function edit($id)
    {
        $material_challan = MaterialChallan::find($id);
        return view('admin.material_challan.ajax_edit', compact('material_challan'));
    }

    public function delete($id)
    {
        $material_challan = MaterialChallan::find($id);
        $material_challan->delete();

        return redirect()->back()->with('danger','Material Challan Deleted Successfully');
    }
}
