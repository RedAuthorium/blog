<?php

namespace App\Http\Controllers;

use App\Post;
use App\Setting;
use App\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
    	$category      	 = Category::take(5)->get();
    	$setting       	 = Setting::first();
    	$first_post    	 = Post::orderBy('created_at', 'desc')->first();
    	$second_post   	 = Post::orderBy('created_at', 'desc')->skip(1)->first();
    	$third_post    	 = Post::orderBy('created_at', 'desc')->skip(2)->first();
    	$postMikasa    	 = Category::find(2);
    	$post2b    	     = Category::find(1);
    	$postsCategory 	 = $postMikasa->posts()->orderBy('created_at', 'desc')->take(3)->get();
    	$postsCategory2b = $post2b->posts()->orderBy('created_at', 'desc')->take(3)->get();

    	return view('welcome')->with('settings', $setting)
    						  ->with('categories', $category)
    						  ->with('first_post', $first_post)
    						  ->with('second_post', $second_post)
    						  ->with('third_post', $third_post)
    						  ->with('postsmikasa', $postMikasa)
    						  ->with('postscategory', $postsCategory)
    						  ->with('posts2b', $post2b)
    						  ->with('postscategory2b', $postsCategory2b);

    }
}
