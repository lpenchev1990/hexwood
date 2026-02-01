<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ColorVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ColorVariantController extends Controller
{
    public function index()
    {
        $variants = ColorVariant::withCount('items')->get();
        return view('admin.color_variants.index', compact('variants'));
    }

    public function create()
    {
        return view('admin.color_variants.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $data['slug'] = Str::slug($data['name']);

        ColorVariant::create($data);

        return redirect()->route('admin.color-variants.index');
    }

    public function edit(ColorVariant $color_variant)
    {
        $color_variant->load('items');
        return view('admin.color_variants.form', [
            'variant' => $color_variant
        ]);
    }

    public function update(Request $request, ColorVariant $color_variant)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $data['slug'] = Str::slug($data['name']);

        $color_variant->update($data);

        return back();
    }

    public function destroy(ColorVariant $color_variant)
    {
        $color_variant->delete();
        return back();
    }
}
