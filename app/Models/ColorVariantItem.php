<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorVariantItem extends Model
{
    protected $fillable = ['variant_id', 'name', 'image', 'sort_order'];

    public function variant()
    {
        return $this->belongsTo(ColorVariant::class, 'variant_id');
    }
}
