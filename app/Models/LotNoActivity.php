<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LotNoActivity extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'created_by_id',
        'lot_no_id',
        'worker_id',
        'action',
        'pcs',
        'price',
        'embroidery_action',
        'party_name',
        'overlock_action',
        'remarks',
        'deleted_at',
    ];

    public function created_by()
    {
    	return $this->belongsTo('App\Models\User','created_by_id','id');
    }
    public function lot_no()
    {
    	return $this->belongsTo('App\Models\LotNo','lot_no_id','id');
    }
    public function worker()
    {
    	return $this->belongsTo('App\Models\Worker','worker_id','id');
    }

}
