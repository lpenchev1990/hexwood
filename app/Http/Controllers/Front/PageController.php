<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Home;
use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        $categories = config('categories');
        $featured_products = [];
        $products = new Product();

        foreach ($categories as $key =>$category) {
            $featured_products[$key] = $products -> getFavoritesProducts($key);
        }
        // $data = (new Home())->getHomeData();
        return $this->viewExt('pages.home', ['fproducts' => $featured_products]);
    }

    public function about()
    {
        $page = (new Page())->getPageBySlug('about-us');
        return view('pages.page', compact('page'));
    }

    public function contacts()
    {
        $page = (new Page())->getPageBySlug('contacts');
        return view('pages.page', compact('page'));
    }
}
