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
        'challan_out_id',
        'challan_in_id',
        'in_out',
        'date',
        'party_id',
        'price',
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
    public function challan_out()
    {
    	return $this->belongsTo('App\Models\Challan','challan_out_id','id');
    }
    public function lot_activities()
    {
    	return $this->hasMany('App\Models\LotNoActivity','challan_id','id');
    }
    public function lot_activity()
    {
    	return $this->belongsTo('App\Models\LotNoActivity','id','challan_id');
    }
    public function sent_pcs()
    {
    	return $this->hasMany('App\Models\LotNoActivity','challan_out_id','id')->where('action','Send To Party');
    }
    public function received_pcs()
    {
    	return $this->hasMany('App\Models\LotNoActivity','challan_out_id','id')->where('action','Received From Party');
    }
}
