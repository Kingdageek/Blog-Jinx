<?php

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
        // Add site blog admin
        $user = App\User::create([
            'name' => 'Nonso Godtime',
            'email' => 'mgbechinonso@bjinx.com',
            'password' => bcrypt('whatever'),
            'is_admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/Profile.jpg',
            'about' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate odit, tenetur, fugit non nam sed illum placeat aut sint impedit, ipsum consequuntur! Vel repellendus temporibus cumque voluptatum, mollitia et voluptatem?',
            'facebook' => 'https://www.facebook.com/kingdageek',
            'youtube' => 'https://www.youtube.com'
        ]);
    }
}
