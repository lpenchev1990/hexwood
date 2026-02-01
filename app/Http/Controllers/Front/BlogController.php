<?php

namespace App\Http\Controllers\Front;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Models\News;

class BlogController extends Controller
{
    public function index()
    {
        $posts = (new News())->getPosts();
        return $this->viewExt('blog.index', compact('posts'));
    }

    public function detail(string $slug)
    {
        $post = (new News())->getPostBySlug($slug);
            return $this->viewExt('blog.detail', compact('post'));
    }
}
