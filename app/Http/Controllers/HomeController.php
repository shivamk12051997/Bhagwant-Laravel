<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LotNo;
use Illuminate\Http\Request;
use App\Models\LotNoActivity;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function login(){
        return redirect('/login');
    }

    public function edit_profile()
    {
        $user = User::find(auth()->user()->id);
        return view('admin.user.edit_profile', compact('user'));
    }
    public function edit_profile_insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:users,phone,'.auth()->user()->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->user()->id,
        ]);

        $user = User::find(auth()->user()->id);
        if(isset($request->password)){
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user->show_password = $request->password;
            $user->password = Hash::make($request->password);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->update();

        return redirect()->back()->with('status','Profile Updated Successfully');
    }
    public function lot_activity_delete()
    {
        $lot_no = LotNo::where('deleted_at','!=',null)->withTrashed()->get();

        // dd($lot_no);
        foreach($lot_no as $key => $value){
            LotNoActivity::where('lot_no_id',$value->id)->delete();
        }
        dd('Done') ;
    }
}
