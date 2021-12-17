<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::all();

        return view('welcome')
            ->with('categories', $categories)
            ->with('tags', $tags)
            ->with('posts', $posts);
    }
}
