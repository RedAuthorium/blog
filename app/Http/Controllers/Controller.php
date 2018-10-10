<?php

namespace App\Http\Controllers;

use View;
use App\Setting;
use App\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $settings   = Setting::first();
        $categories  = Category::take(5)->get();

        View::share('settings', $settings);
        View::share('categories', $categories);
    }
}
