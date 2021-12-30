<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Tag;
use App\Post;
use App\Product;
use App\Slide;
use App\User;

class DashboardController extends IndexController
{
    public function index()
    {
        $categories = Category::all()->count();
        $posts = Post::all()->count();
        $trashedPosts = Post::onlyTrashed()->count();
        $tags = Tag::all()->count();
        $slides = Slide::all()->count();
        $users = User::all()->count();
        $products = Product::all()->count();

        return view('admin.dashboard.index')
            ->with('categories', $categories)
            ->with('tags', $tags)
            ->with('posts', $posts)
            ->with('trashedPosts', $trashedPosts)
            ->with('slides', $slides)
            ->with('users', $users)
            ->with('products', $products);
    }
}
