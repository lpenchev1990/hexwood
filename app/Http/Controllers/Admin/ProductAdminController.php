<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $product->admin()->updateOrCreate(
            ['product_id' => $product->id],
            [
                'internal_notes' => $request->internal_notes,
                'is_featured'    => $request->has('is_featured'),
            ]
        );

        return back()->with('success', 'Административните данни са запазени');
    }
}
