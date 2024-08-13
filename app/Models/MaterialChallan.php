<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaterialChallan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'created_by_id',
        'party_id',
        'material_item_id',
        'challan_no',
        'send_date',
        'per_unit_price',
        'qty',
        'total_price',
        'is_paid',
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
    public function material_item()
    {
    	return $this->belongsTo('App\Models\MaterialItem','material_item_id','id');
    }
}
