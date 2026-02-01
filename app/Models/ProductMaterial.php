<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMaterial extends Model
{
    protected $fillable = [
        'product_id','name','unit_price','quantity','total_price','link'
    ];
}
