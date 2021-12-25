<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SitePostsController extends Controller
{
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

        return view('site.posts.index')
            ->with('categories', $categories)
            ->with('tags', $tags)
            ->with('posts', $posts)
            ->with('topPosts', $topPosts);
    }

    public function show(Post $post)
    {
        return view('site.posts.show')->with('post', $post);
    }

    public function category(Category $category)
    {
        $categories = Category::all();
        $tags = Tag::all();

        $search = \request()->query('search');
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

    public function tag(Tag $tag)
    {
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
