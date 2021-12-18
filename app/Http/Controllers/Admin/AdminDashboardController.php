<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Slide;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all()->count();
        $posts = Post::all()->count();
        $trashedPosts = Post::onlyTrashed()->count();
        $tags = Tag::all()->count();
        $slides = Slide::all()->count();
        $users = User::all()->count();

        return view('admin.dashboard.index')
            ->with('categories', $categories)
            ->with('posts', $posts)
            ->with('trashedPosts', $trashedPosts)
            ->with('tags', $tags)
            ->with('slides', $slides)
            ->with('users', $users);
    }
}
