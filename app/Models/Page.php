<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Page
{
    protected string $table = 'pages';

    public function getPageBySlug(string $slug)
    {
        return DB::table($this->table)
            ->where('slug', $slug)
            ->first();
    }
}
