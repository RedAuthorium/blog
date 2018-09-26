<?php

namespace App\Http\Controllers;

use App\Tag;
use Session;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        if($categories->count() == 0 || $tags->count() == 0){
            Session::flash('info', 'You must have some categories and tags before create a post!');
            return redirect()->back();
        }

        return view('admin.posts.create')->with('categories', $categories)
                                        ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required',
            'content'     => 'required',
            'featured'    => 'required|image',
            'category_id' => 'required',
            'tags'         => 'required'
        ]);

        $featured =  $request->featured;

        $featured_new_name = time() . $featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title'       => $request->title,
            'content'     => $request->content,
            'featured'    => 'uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'slug'        => str_slug($request->title)
        ]);

        $post->tags()->attach($request->tags);
 
        Session::flash('success', 'Your post is successfully created');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $category = Category::all();

        $tag = Tag::all();

        return view('admin.posts.edit')->with('post', $post)
                                      ->with('categories', $category)
                                      ->with('tags', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $this->validate($request, [
            'title'       => 'required',
            'content'     => 'required',
            'category_id' => 'required',
            'tags'         => 'required'
        ]);

        $post = Post::findOrFail($id);

        if($request->hasFile('featured')){
            $featured =  $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/posts', $featured_new_name);   

            $post->featured = 'uploads/posts/' . $featured_new_name;
        }

        $post->title = $request->title;
        $post->content =  $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);
 
        Session::flash('success', 'Your post is successfully updated');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'Your post moved to trash!');

        return redirect()->back();
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function remove($id)
    {
        $posts = Post::withTrashed()->where('id', $id)->first();

        $posts->forceDelete();

        Session::flash('success', 'Success deleted permanently!');

        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        Session::flash('success', 'Success restored the post!');

        return redirect()->route('posts');
    }
}
