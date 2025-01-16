<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         // Tài khoản Admin
         User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        // Tài khoản User 1
        User::factory()->create([
            'name' => 'Văn Khoa',
            'email' => 'vankhoa@gmail.com',
            'role' => 'user',
            'password' => Hash::make('12042005'),
        ]);
    }
}
