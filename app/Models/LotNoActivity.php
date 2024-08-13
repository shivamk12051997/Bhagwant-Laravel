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
        'challan_id',
        'challan_out_id',
        'action',
        'date',
        'pcs',
        'price',
        'total_earning',
        'embroidery_action',
        'party_id',
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
    public function party()
    {
    	return $this->belongsTo('App\Models\Party','party_id','id');
    }
    public function challan_out()
    {
    	return $this->belongsTo('App\Models\Challan','challan_out_id','id');
    }
    public function challan_in()
    {
    	return $this->belongsTo('App\Models\Challan','challan_in_id','id');
    }

}
