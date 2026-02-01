<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
        'tags',
        'updated_at'
    ];

    protected $table = 'news';
    public function getImageUrlAttribute()
    {
        return $this->image
            ? Storage::disk('public')->url($this->image)
            : null;
    }
    public function getPosts()
    {
        return DB::table($this->table)
            ->orderBy('created_at', 'desc')
            ->get()->toArray();
    }

    public function getPostBySlug(string $slug)
    {
        return DB::table($this->table)
            ->where('slug', $slug)
            ->first();
    }
}

