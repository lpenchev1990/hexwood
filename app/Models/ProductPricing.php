<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPricing extends Model
{
    protected $table = 'product_pricing';
    protected $fillable = ['product_id','work_hours','hour_price'];
    public $timestamps = true;
    public $incrementing = false;
    protected $primaryKey = 'product_id';
}
