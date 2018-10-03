<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
        	'site_name' => 'go blog',
        	'address' => 'Kalimantan',
        	'contact_phone' => '12345678',
        	'contact_email' => 'info@goblog.com'
        ]);
    }
}
