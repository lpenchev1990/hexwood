<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAdmin extends Model
{
    protected $table = 'product_admin';
    protected $fillable = ['product_id','internal_notes','is_featured'];
    public $timestamps = true;
    public $incrementing = false;
    protected $primaryKey = 'product_id';
}
