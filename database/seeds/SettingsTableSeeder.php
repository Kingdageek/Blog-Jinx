<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Settings::create([
            'site_name' => 'Blog Jinx',
            'contact_number' => '882289 8883',
            'contact_email' => 'info@bjinx.com',
            'address' => 'Lagos, Nigeria'
        ]);
    }
}
