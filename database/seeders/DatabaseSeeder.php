<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('username', 'admin')->first();

        if ($user) {
            $user->password = Hash::make('adminsekolah');
            $user->save();
        }
    }
}