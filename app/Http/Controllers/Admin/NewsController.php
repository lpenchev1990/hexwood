<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index', [
            'news' => News::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.news.form');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'tags'    => 'nullable|string',
            'image'   => 'nullable|image|max:2048',
        ]);

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        News::create($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'Новината е създадена успешно');
    }

    public function edit(News $news)
    {
        return view('admin.news.form', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'tags'    => 'nullable|string',
            'image'   => 'nullable|image|max:2048',
        ]);

        // ако сменим заглавието – обновяваме slug
        if ($data['title'] !== $news->title) {
            $data['slug'] = Str::slug($data['title']);
        }

        if ($request->hasFile('image')) {

            // 🔥 изтриваме старата снимка
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }

            // 🔥 записваме новата
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'Новината е обновена успешно');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return back();
    }
}
