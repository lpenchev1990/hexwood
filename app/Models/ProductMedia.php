<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductMedia extends Model
{
    protected $fillable = [
        'product_id','file','type','title','is_primary','sort_order'
    ];
}
