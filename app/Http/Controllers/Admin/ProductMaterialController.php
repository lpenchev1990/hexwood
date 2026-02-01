<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductMaterialController extends Controller
{
    public function store(Request $request, Product $product)
    {
        foreach ($request->materials as $row) {
            $row['total_price'] = $row['unit_price'] * $row['quantity'];
            $product->materials()->create($row);
        }

        return back();
    }
}
