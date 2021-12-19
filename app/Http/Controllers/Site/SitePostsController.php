<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Post;
use App\Tag;
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

    public function category($id)
    {
        $search = \request()->query('search');
        $category = Category::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();

        if($search) {
            $posts = $category->posts()->where('title', 'LIKE', "%{$search}%")->simplePaginate(3);
        } else {
            $posts = $category->posts()->simplePaginate(3);
        }

        return view('site.posts.category')
            ->with('categories', $categories)
            ->with('category', $category)
            ->with('tags', $tags)
            ->with('posts', $posts);
    }

    public function tag($id)
    {
        $tag = Category::findOrFail($id);
        $categories = Category::all();
        $posts = $tag->posts()->simplePaginate(3);
        $tags = Tag::all();

        return view('site.posts.tag')
            ->with('tag', $tag)
            ->with('categories', $categories)
            ->with('tags', $tags)
            ->with('posts', $posts);
    }
}
