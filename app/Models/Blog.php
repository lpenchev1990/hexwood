<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Blog
{
    protected string $table = 'blog_posts';

    public function getPosts()
    {
        return DB::table($this->table)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                $item->image_url = $item->image
                    ? Storage::disk('public')->url($item->image)
                    : null;
                return $item;
            });
    }

    public function getPostBySlug(string $slug)
    {
        return DB::table($this->table)
            ->where('slug', $slug)
            ->first();
    }
}
