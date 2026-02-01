<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Category
{
    protected string $table = 'categories';

    public function getCategories()
    {
        return DB::table($this->table)
            ->select('id', 'name', 'slug')
            ->orderBy('position')
            ->get();
    }

    public function getCategoryBySlug(string $slug)
    {
        return DB::table($this->table)
            ->where('slug', $slug)
            ->first();
    }
}
