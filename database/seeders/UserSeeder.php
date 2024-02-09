<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name'=>"Ali",
            'last_name'=>"Yılmaz",
            'email'=>'admin@admin',
            'password'=>Hash::make('1234'),
            'auth'=>1,
        ]);
        User::create([
            'first_name'=>"Veli",
            'last_name'=>"Yılmaz",
            'email'=>'mod@mod',
            'password'=>Hash::make('1234'),
            'auth'=>1,
        ]);
    }
}
