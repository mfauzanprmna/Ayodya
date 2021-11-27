<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Fauzan',
            'foto' => 'image/default.png',
            'email' => 'fauzan@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
