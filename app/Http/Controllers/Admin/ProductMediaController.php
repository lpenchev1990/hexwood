<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductMediaController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'files.*' => 'required|file|max:10240', // 10MB
            'type'    => 'required|in:image,document',
        ]);

        foreach ($request->file('files') as $file) {

            $path = $file->store('products', 'public');

            ProductMedia::create([
                'product_id' => $product->id,
                'file'       => $path,
                'type'       => $request->type,
                'title'      => $file->getClientOriginalName(),
            ]);
        }

        return back();
    }

    public function download(ProductMedia $media)
    {
        return Storage::disk('public')->download($media->file, $media->title);
    }

    public function destroy(ProductMedia $media)
    {
        Storage::disk('public')->delete($media->file);
        $media->delete();

        return back();
    }
}

