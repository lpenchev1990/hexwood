<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorVariant extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    public function items()
    {
        return $this->hasMany(ColorVariantItem::class, 'variant_id')
            ->orderBy('sort_order');
    }
}
