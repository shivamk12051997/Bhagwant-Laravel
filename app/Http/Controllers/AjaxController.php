<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Models\MasterLot;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    function get_worker(Request $request)
    {
        return view('ajax.get_worker', compact('request'));
    }
    function get_worker_price(Request $request)
    {
        $master_lot = MasterLot::where('from', '<=', $request->lot_no)->where('to', '>=', $request->lot_no)->where('deleted_at', null)->first();
        if($request->action == 'Printing/Embroidery'){
            $price = $master_lot->printing_price ?? 0;
        }elseif($request->action == 'Sewing Machine'){
            $price = $master_lot->sewing_machine_price ?? 0;
        }elseif($request->action == 'Overlock'){
            $price = $master_lot->overlock_price ?? 0;
        }elseif($request->action == 'Linking'){
            $price = $master_lot->linking_price ?? 0;
        }elseif($request->action == 'Kaj Button'){
            $price = $master_lot->kaj_button_price ?? 0;
        }elseif($request->action == 'Thread Cutting'){
            $price = $master_lot->thread_cutting_price ?? 0;
        }elseif($request->action == 'Packing'){
            $price = $master_lot->packing_price ?? 0;
        }elseif($request->action == 'Press'){
            $price = $master_lot->press_price ?? 0;
        }

        return $price;
    }
    function get_master_lot_details(Request $request)
    {
        $master_lot = MasterLot::where('from', '<=', $request->lot_no)->where('to', '>=', $request->lot_no)->where('deleted_at', null)->first();

        return view('ajax.get_master_lot_details', compact('request','master_lot'));
    }
}
