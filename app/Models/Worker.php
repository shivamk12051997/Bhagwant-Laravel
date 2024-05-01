<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Worker extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'created_by_id',
        'name',
        'worker_code',
        'role',
        'status',
    ];

    public function created_by()
    {
    	return $this->belongsTo('App\Models\User','created_by_id','id');
    }
    public function lot_activities()
    {
    	return $this->hasMany('App\Models\LotNoActivity','worker_id','id');
    }
}
