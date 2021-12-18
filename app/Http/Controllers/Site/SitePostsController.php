<?php

namespace App\Http\Controllers\Site;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SitePostsController extends Controller
{
    /**
     * Show single post
     */
    public function show(Post $post)
    {
        return view('site.posts.show')->with('post', $post);
    }
}
