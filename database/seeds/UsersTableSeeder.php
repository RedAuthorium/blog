<?php

use App\User;
use App\Profile;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name'     => 'admin',
        	'email'    => 'admin@mail.com',
        	'password' => bcrypt('123'),
            'admin'    => 1
        ]);

        Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/avatar.jpg',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor',
            'facebook' => 'facebook.com',
            'instagram' => 'instagram.com',

        ]);
    }
}
