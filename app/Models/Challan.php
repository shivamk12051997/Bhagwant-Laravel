<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Challan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'created_by_id',
        'challan_no',
        'in_out',
        'date',
        'party_id',
        'received_pcs',
        'price',
        'total_amount',
        'status',
        'remarks',
        'deleted_at',
    ];

    public function created_by()
    {
    	return $this->belongsTo('App\Models\User','created_by_id','id');
    }
    public function party()
    {
    	return $this->belongsTo('App\Models\Party','party_id','id');
    }
    public function lot_activities()
    {
    	return $this->hasMany('App\Models\LotNoActivity','challan_id','id');
    }
}
