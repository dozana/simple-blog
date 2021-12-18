<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteHomeController extends Controller
{
    /**
     * Display a home page.
     *
     */
    public function index()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::all();

        return view('site.home')
            ->with('categories', $categories)
            ->with('tags', $tags)
            ->with('posts', $posts);
    }
}
