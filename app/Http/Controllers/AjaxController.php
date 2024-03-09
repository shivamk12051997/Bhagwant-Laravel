<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    function get_worker(Request $request)
    {
        return view('ajax.get_worker', compact('request'));
    }
}
