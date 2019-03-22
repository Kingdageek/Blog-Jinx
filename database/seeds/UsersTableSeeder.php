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
        App\User::create([
            'name' => 'Nonso Godtime',
            'email' => 'mgbechinonso@bjinx.com',
            'password' => bcrypt('whatever')
        ]);
    }
}
