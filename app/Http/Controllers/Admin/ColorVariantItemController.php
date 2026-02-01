<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ColorVariant;
use App\Models\ColorVariantItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ColorVariantItemController extends Controller
{
    public function store(Request $request, ColorVariant $variant)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('color-variants', 'public');
        }

        $variant->items()->create($data);

        return back();
    }

    public function destroy(ColorVariantItem $item)
    {
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();
        return back();
    }
}
