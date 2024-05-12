<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterLot extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'created_by_id',
        'from',
        'to',
        'size_ids',
        'cutting_price',
        'printing_price',
        'sewing_machine_price',
        'overlock_price',
        'linking_price',
        'kaj_button_price',
        'thread_cutting_price',
        'press_price',
        'packing_price',
        'show_gender',
        'show_press',
        'deleted_at',
    ];

    public function created_by()
    {
    	return $this->belongsTo('App\Models\User','created_by_id','id');
    }
    
}
