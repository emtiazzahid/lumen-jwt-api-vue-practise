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
        \App\User::create([
            'name' => 'Test User',
            'email' => 'user@mail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('123')
        ]);
    }
}
