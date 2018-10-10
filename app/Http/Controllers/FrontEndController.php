<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $post2b          = Category::find(1);
        $postMikasa      = Category::find(2);
        $first_post      = Post::orderBy('created_at', 'desc')->first();
        $second_post     = Post::orderBy('created_at', 'desc')->skip(1)->first();
        $third_post      = Post::orderBy('created_at', 'desc')->skip(2)->first();
    	$postsCategory2b = $post2b->posts()->orderBy('created_at', 'desc')->take(3)->get();
        $postsCategory   = $postMikasa->posts()->orderBy('created_at', 'desc')->take(3)->get();

    	return view('welcome')->with('posts2b', $post2b)
                              ->with('third_post', $third_post)
                              ->with('first_post', $first_post)
                              ->with('postsmikasa', $postMikasa)
                              ->with('second_post', $second_post)
    						  ->with('postscategory', $postsCategory)
    						  ->with('postscategory2b', $postsCategory2b);
    }

    public function singlePost($slug)
    {
        $tags      = Tag::all();
        $post      = Post::where('slug', $slug)->first();
        $tag       = $post->tags->all();
        $next      = Post::where('id', '>', $post->id)->orderBy('created_at', 'desc')->first();
        $prev      = Post::where('id', '<', $post->id)->orderBy('created_at', 'desc')->first();

        return view('single')->with('tags', $tag)
                             ->with('post', $post)
                             ->with('prev', $prev)
                             ->with('next', $next)
                             ->with('alltag', $tags)
                             ->with('title', $post->title);
    }

    public function category($id)
    {
        $category = Category::find($id);
        
        return view('category')->with('category', $category)
                               ->with('title', $category->name);
    }

    public function tag($id)
    {
        $tag = Tag::find($id);

        return view('tag')->with('tag', $tag)
                          ->with('title', $tag->tag);
    }
}
