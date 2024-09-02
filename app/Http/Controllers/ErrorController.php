<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\LotNoActivity;
use App\Http\Controllers\Controller;
use App\Models\LotNo;
use Illuminate\Support\Facades\Auth;

class ErrorController extends Controller
{
    public function calculate_total_earning_in_lot_activity_table()
    {   
        $lot_no_activity = LotNoActivity::get();
        foreach ($lot_no_activity as $key => $item) {
            $item->total_earning = $item->pcs * $item->price;
            $item->save();
        }
        dd('Done');
    }
    public function update_last_status_in_lot_activity()
    {   
        $lot_no = LotNo::get();
        foreach ($lot_no as $key => $item) {
            $item->status = $item->last_activity->action;
            $item->save();
        }
        dd('Done');
    }
}
