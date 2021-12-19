<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

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
        $posts = Post::simplePaginate(2);
        $topPosts = Post::limit(3)->get();

        $search = \request()->query('search');

        if($search) {
            $posts = Post::where('title','LIKE',"%{$search}%")->simplePaginate(3);
        } else {
            $posts = Post::simplePaginate(1);
        }

        return view('site.home')
            ->with('categories', $categories)
            ->with('tags', $tags)
            ->with('posts', $posts)
            ->with('topPosts', $topPosts);
    }
}
