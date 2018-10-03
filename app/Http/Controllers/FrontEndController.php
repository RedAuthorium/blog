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
    	$category = Category::take(5)->get();
    	$setting = Setting::first()->site_name;
    	$first_post = Post::orderBy('created_at', 'desc')->first();
    	$second_post = Post::orderBy('created_at', 'desc')->skip(1)->first();
    	return view('welcome')->with('title', $setting)
    						  ->with('categories', $category)
    						  ->with('first_post', $first_post)
    						  ->with('second_post', $second_post);
    }
}
