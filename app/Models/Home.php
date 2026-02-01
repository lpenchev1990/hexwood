<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Home
{
    public function getHomeData()
    {
        return [
            'featured_products' => DB::table('products')
                ->where('featured', 1)
                ->limit(6)
                ->get(),

            'categories' => DB::table('categories')
                ->orderBy('position')
                ->get()
        ];
    }
}
