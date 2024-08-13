<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Party extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'created_by_id',
        'party_code',
        'name',
        'phone',
        'price',
        'status',
        'deleted_at',
    ];

    public function created_by()
    {
    	return $this->belongsTo('App\Models\User','created_by_id','id');
    }
    public function lot_activities()
    {
    	return $this->hasMany('App\Models\LotNoActivity','party_id','id');
    }
    public function payment_histories()
    {
    	return $this->hasMany('App\Models\PaymentHistory','party_id','id');
    }
}
