<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title','sku','category_key','color_variant_id',
        'description','price','is_active'
    ];

    public function media()
    {
        return $this->hasMany(ProductMedia::class);
    }

    public function materials()
    {
        return $this->hasMany(ProductMaterial::class);
    }

    public function pricing()
    {
        return $this->hasOne(ProductPricing::class);
    }

    public function admin()
    {
        return $this->hasOne(ProductAdmin::class);
    }

    public function getFavoritesProducts($categoryKey)
    {
        return Product::with(['admin', 'firstImage'])
            ->where('category_key', $categoryKey)
            ->whereHas('admin', function ($q) {
                $q->where('is_featured', 1);
            })
            ->latest()
            ->take(4)
            ->get()
            ->map(function ($product) {
                return [
                    'id'    => $product->id,
                    'title' => $product->title,
                    'slug'  => $product->slug,
                    'sku'   => $product->sku,
                    'price' => $product->price,
                    'image' => $product->firstImage
                        ? $product->firstImage->file
                        : null,
                ];
            })
            ->toArray();
    }
    public function getByCategorySlug(string $slug, int $limit = null)
    {
        $categories = config('categories');

        // slug => category_key
        $categoryKey = collect($categories)
            ->mapWithKeys(function ($value, $key) {
                $label = is_array($value)
                    ? ($value['label'] ?? $key)
                    : $value;

                return [
                    Str::slug($label) => $key
                ];
            })
            ->get($slug);

        if (!$categoryKey) {
            return collect();
        }

        $query = self::with(['admin', 'firstImage'])
            ->where('category_key', $categoryKey)
            ->where('is_active', 1)
            ->latest();

        if ($limit) {
            $query->limit($limit);
        }

        return $query->get()->map(function ($product) {
            return [
                'id'    => $product->id,
                'title' => $product->title,
                'slug'  => $product->slug,
                'sku'   => $product->sku,
                'price' => $product->price,
                'image' => $product->firstImage
                    ? $product->firstImage->file
                    : null,
            ];
        });
    }

    public function firstImage()
    {
        return $this->hasOne(ProductMedia::class)
            ->where('type', 'image')
            ->orderBy('id');
    }
    public function getDetailById(string $id): ?array
    {
        $product = self::with([
            'media',
            'materials',
            'pricing',
            'admin',
        ])
            ->where('id', $id)
            ->where('is_active', 1)
            ->first();

        if (!$product) {
            return null;
        }

        return [
            'id'          => $product->id,
            'title'       => $product->title,
            'slug'        => $product->slug,
            'sku'         => $product->sku,
            'price'       => $product->price,
            'description' => $product->description,
            'category' => $product->category_key,
            'images' => $product->media
                ->where('type', 'image')
                ->values()
                ->map(fn ($m) => $m->file),

        ];
    }


}
