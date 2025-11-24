<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email'=>'vendor@example.com'],
            ['name'=>'Vendor Admin','password'=>Hash::make('password'),'role'=>'vendor']
        );

        User::updateOrCreate(
            ['email'=>'customer@example.com'],
            ['name'=>'John Customer','password'=>Hash::make('password'),'role'=>'customer']
        );
    }
}
