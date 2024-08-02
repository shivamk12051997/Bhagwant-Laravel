<?php

namespace App\Http\Controllers\Admin;

use App\Models\Party;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasterPartyController extends Controller
{
    public function index()
    {
        return view('admin.master.party.index');
    }
    public function datatable()
    {
        $party = Party::latest()->get();
        return view('admin.master.party.datatable', compact('party'));
    }

    public function insert(Request $request)
    {
        if(Party::whereNotIn('id',[$request->id])->where('name',$request->name)->where('deleted_at',null)->first()){
            return 0;
        }else{
            $input = $request->all();
            if($request->id == 0){
                $input['created_by_id'] = auth()->user()->id;
            }
            $input['role'] = json_encode($request->role ?? []);
            $input['status'] = $request->status ?? 0;

            $party = Party::updateOrCreate(['id' => $input['id']],$input);

            return $party;
        }
    }

    public function edit($id)
    {
        $party = Party::find($id);
        return view('admin.master.party.ajax_edit', compact('party'));
    }

    public function delete($id)
    {
        $party = Party::find($id);
        $party->delete();

        return redirect()->back()->with('danger','Party Deleted Successfully');
    }
    public function status($id)
    {
        $party = Party::find($id);
        if($party->status == 1){
            $party->status = 0; 
        }else{
            $party->status = 1;
        }
        $party->update();

        return $party->status;
    }
}
