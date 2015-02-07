<?php

use Illuminate\Database\Seeder;
use TagPage\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);
    }
}