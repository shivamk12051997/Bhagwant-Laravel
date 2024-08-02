<?php

namespace App\Http\Controllers;

use App\Models\LotNo;
use App\Models\Party;
use App\Models\Worker;
use App\Models\MasterLot;
use Illuminate\Http\Request;
use App\Models\LotNoActivity;

class AjaxController extends Controller
{
    function get_worker(Request $request)
    {
        return view('ajax.get_worker', compact('request'));
    }
    function get_worker_price(Request $request)
    {
        $master_lot = MasterLot::where('from', '<=', $request->lot_no)->where('to', '>=', $request->lot_no)->where('deleted_at', null)->first();
        if($request->action == 'Cutting'){
            $price = $master_lot->cutting_price ?? 0;
        }elseif($request->action == 'Printing/Embroidery'){
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
    function get_party_details(Request $request)
    {
        $party = Party::find($request->party_id);
        
        return $party;
    }
    function get_all_lot_no_total_pcs(Request $request)
    {
        $total_pcs = LotNo::whereIn('id', $request->lot_no_ids)->sum('pcs');
        return $total_pcs;
    }
    function get_all_lot_no_pcs(Request $request)
    {
        $net_pcs_by_lot = LotNoActivity::selectRaw('
            lot_no_activities.lot_no_id,
            lot_nos.lot_no,
            SUM(CASE 
                WHEN lot_no_activities.action = "Send To Party" THEN lot_no_activities.pcs 
                WHEN lot_no_activities.action = "Received From Party" THEN -lot_no_activities.pcs 
                ELSE 0 
            END) as remain_pcs,
            SUM(CASE 
                WHEN lot_no_activities.action = "Send To Party" THEN lot_no_activities.pcs 
                ELSE 0 
            END) as sent_pcs
        ')
        ->join('lot_nos', 'lot_no_activities.lot_no_id', '=', 'lot_nos.id')
        ->whereIn('lot_no_activities.lot_no_id', $request->lot_no_ids)
        ->whereIn('lot_no_activities.action', ['Send To Party', 'Received From Party'])
        ->groupBy('lot_no_activities.lot_no_id', 'lot_nos.lot_no')
        ->get();

        return $net_pcs_by_lot;
    }
}