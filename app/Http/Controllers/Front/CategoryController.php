<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = (new Category())->getCategories();
        return view('categories.index', compact('categories'));
    }

    public function detail(string $slug)
    {
        $showArticles = 1;
        $products = (new Product())->getByCategorySlug($slug);
        if ($slug == 'your-idea') $showArticles = 0;
        return $this->viewExt('categories.detail',
            [
                'category' => config('categories.' . $slug),
                'showArticles' => $showArticles,
                'products' => $products
            ]);
    }

    public function productDetail(string $slug)
    {
        $product = (new Product())->getDetailById($slug);
//        dd($product);
        return $this->viewExt('products.detail', compact('product'));
    }
}
