<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    function get_worker(Request $request)
    {
        return view('ajax.get_worker', compact('request'));
    }
    function get_worker_price(Request $request)
    {
        $worker = Worker::find($request->worker_id);
        return ($worker->price ?? 0);
    }
}
