<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LotNo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'created_by_id',
        'lot_no',
        'color_id',
        'size_id',
        'pcs',
        'gender',
        'press',
        'status',
        'is_complete',
        'deleted_at',
    ];

    public function created_by()
    {
    	return $this->belongsTo('App\Models\User','created_by_id','id');
    }
    public function color()
    {
    	return $this->belongsTo('App\Models\Color','color_id','id');
    }
    public function size()
    {
    	return $this->belongsTo('App\Models\Size','size_id','id');
    }
    public function worker()
    {
    	return $this->belongsTo('App\Models\Worker','worker_id','id');
    }
    public function lot_activities()
    {
    	return $this->hasMany('App\Models\LotNoActivity','lot_no_id','id');
    }
    public function last_activity()
    {
    	return $this->belongsTo('App\Models\LotNoActivity','id','lot_no_id')->latest();
    }
}
