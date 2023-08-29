<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@mail.com";
        $user->email_verified_at = time();
        $user->password = Hash::make('password');
        $user->save();
    }
}
