<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder {
    public function run(): void {
        User::create([
            'name' => 'Vendor Admin',
            'email' => 'vendor@foodapp.com',
            'password' => Hash::make('password'),
            'role' => 'vendor',
            'phone' => '0700000001',
            'address' => 'Nairobi'
        ]);

        User::create([
            'name' => 'John Customer',
            'email' => 'customer@foodapp.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '0711000002',
            'address' => 'Mombasa'
        ]);
    }
}
