<?php

namespace App\Http\Controllers;

use Session;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
    	$setting = Setting::first();
    	return view('admin.settings.index')->with('settings', $setting);
    }

    public function update()
    {
    	$this->validate(request(), [
    		'site_name' => 'required',
    		'contact_phone' => 'required',
    		'contact_email' => 'required',
    		'address' => 'required',
            'about' => 'required'
    	]);

    	$settings = Setting::first();
    	
    	$settings->site_name = request()->site_name;
    	$settings->contact_phone = request()->contact_phone;
    	$settings->contact_email = request()->contact_email;
    	$settings->address = request()->address;
        $settings->about = request()->about;
    	$settings->save();

    	Session::flash('success', 'Your site info successfully updated!');
    	return redirect()->back();
    }
}
