<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/

Route::get('/', 'FrontEndController@index')->name('index');

Route::post('/subscribe', function() {
    $email = request('email');
    Newsletter::subscribe($email);

    Session::flash('subscribe', 'You are join us!');
    return redirect()->back();
});

Route::get('/results', function () {

    $posts = \App\Post::where('title', 'like', '%' . request('query') . '%')->get();
    return view('result')->with('posts', $posts)
                         ->with('title', request('query'))
                         ->with('settings', \App\Setting::first())
                         ->with('categories', \App\Category::take(5)->get());

});

Route::get('/post/{slug}', 'FrontEndController@singlePost')->name('single.post');

Route::get('/category/{id}', 'FrontEndController@category')->name('single.category');

Route::get('/tag/{id}', 'FrontEndController@tag')->name('single.tag');

Route::get('/test', function () {
    return App\Category::find(5)->post;
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/posts', 'PostsController@index')->name('posts');

    Route::get('/post/trashed', 'PostsController@trashed')->name('post.trash');

    Route::get('/post/remove/{id}', 'PostsController@remove')->name('post.remove');

    Route::get('/post/restore/{id}', 'PostsController@restore')->name('post.restore');

    Route::get('/post/create' ,'PostsController@create')->name('post.create');
    
    Route::post('/post/store' ,'PostsController@store')->name('post.store');

    Route::get('/post/delete/{id}' ,'PostsController@destroy')->name('post.delete');

    Route::get('/post/edit/{id}' ,'PostsController@edit')->name('post.edit');

    Route::post('/post/update/{id}' ,'PostsController@update')->name('post.update');

    //category route

    Route::get('/categories' ,'CategoriesController@index')->name('categories');

    Route::get('/category/create' ,'CategoriesController@create')->name('category.create');

    Route::post('/category/store' ,'CategoriesController@store')->name('category.store');

    Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');

    Route::get('/category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');

    Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');

    //Tag route

    Route::get('/tags' ,'TagsController@index')->name('tags');

    Route::get('/tag/create' ,'TagsController@create')->name('tag.create');

    Route::post('/tag/store' ,'TagsController@store')->name('tag.store');

    Route::get('/tag/edit/{id}', 'TagsController@edit')->name('tag.edit');

    Route::get('/tag/delete/{id}', 'TagsController@destroy')->name('tag.delete');

    Route::post('/tag/update/{id}', 'TagsController@update')->name('tag.update');

    // route profile

    Route::get('user/profile', 'ProfilesController@index')->name('user.profile');

    Route::post('user/profile/update', 'ProfilesController@update')->name('user.profile.update');

    // route user

    Route::get('/users', 'UsersController@index')->name('users');

    Route::get('/user/create', 'UsersController@create')->name('user.create');

    Route::get('/user/delete/{id}', 'UsersController@destroy')->name('user.delete');

    Route::post('/user/store', 'UsersController@store')->name('user.store');

    Route::get('/user/admin/{id}', 'UsersController@admin')->name('user.admin');

    Route::get('/user/not-admin/{id}', 'UsersController@notAdmin')->name('user.not.admin');

    // route setting

    Route::get('/settings', 'SettingsController@index')->name('settings');

    Route::post('setting/update', 'SettingsController@update')->name('setting.update');

});
