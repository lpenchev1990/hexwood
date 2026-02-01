<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ColorVariant;
use App\Models\Product;
use App\Models\ProductAdmin;
use App\Models\ProductPricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.products.form', [
            'categories' => config('categories'),
            'variants' => ColorVariant::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'category_key' => 'required',
            'color_variant_id' => 'nullable|exists:color_variants,id',
            'description' => 'nullable',
            'price' => 'nullable|numeric'
        ]);
        $data['sku'] = $this->generateSku();

        $product = Product::create($data);

        ProductPricing::create(['product_id' => $product->id]);
        ProductAdmin::create(['product_id' => $product->id]);

        return redirect()->route('admin.products.edit', $product);
    }

    public function edit(Product $product)
    {
        $product->load(['media','materials','pricing','admin']);

        return view('admin.products.form', [
            'product' => $product,
            'categories' => config('categories'),
            'variants' => ColorVariant::all()
        ]);
    }
    public function update(Request $request, Product $product)
    {

        // 1️⃣ Основни данни (MAIN TAB)
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'category_key'     => 'required|string',
            'color_variant_id' => 'nullable|exists:color_variants,id',
            'description'      => 'nullable|string',
            'price'            => 'nullable|numeric',
        ]);

        // checkbox ако не е пратен → false
        $data['is_active'] = $request->has('is_active');

        $product->update($data);

        // 2️⃣ PRICING TAB
        if ($request->hasAny(['work_hours', 'hour_price'])) {
            $product->pricing()->updateOrCreate(
                ['product_id' => $product->id],
                [
                    'work_hours' => $request->work_hours,
                    'hour_price' => $request->hour_price,
                ]
            );
        }

        // 3️⃣ ADMIN TAB
        if ($request->hasAny(['internal_notes', 'is_featured'])) {
            $status = $product->admin()->updateOrCreate(
                ['product_id' => $product->id],
                [
                    'internal_notes' => $request->internal_notes,
                    'is_featured'    => $request->has('is_featured'),
                ]
            );
            dd($status,                ['product_id' => $product->id],
                [
                    'internal_notes' => $request->internal_notes,
                    'is_featured'    => $request->has('is_featured'),
                ]
            );
        }

        return back()->with('success', 'Продуктът е обновен успешно');
    }
    protected function generateSku(): string
    {
        $lastId = Product::withTrashed()->max('id') ?? 0;
        return 'PRD-' . str_pad($lastId + 1, 6, '0', STR_PAD_LEFT);
    }
    public function destroy(Product $product)
    {
        // 1️⃣ Изтриваме всички файлове (галерия + документи)
        foreach ($product->media as $media) {
            Storage::disk('public')->delete($media->file);
        }

        // 2️⃣ Изтриваме продукта
        // (media, materials, pricing, admin се чистят с cascade)
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Продуктът е изтрит успешно');
    }
}

