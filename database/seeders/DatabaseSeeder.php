<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with dummy test users
     */
    public function run(): void
    {
        // Create test users with dummy credentials for development
        
        // Primary Guardian - Admin account
        User::firstOrCreate(
            ['email' => 'guardian@shaiyra.test'],
            [
                'name' => 'Sarah Guardian',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // Secondary Guardian - Co-parent account
        User::firstOrCreate(
            ['email' => 'guardian2@shaiyra.test'],
            [
                'name' => 'John Guardian',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // Extended Family Member - Grandparent
        User::firstOrCreate(
            ['email' => 'grandma@shaiyra.test'],
            [
                'name' => 'Margaret Grandma',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // Extended Family Member - Aunt
        User::firstOrCreate(
            ['email' => 'aunt@shaiyra.test'],
            [
                'name' => 'Emily Aunt',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // Demo Account - For testing public features
        User::firstOrCreate(
            ['email' => 'demo@shaiyra.test'],
            [
                'name' => 'Demo User',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // Generic Test Account
        User::firstOrCreate(
            ['email' => 'test@shaiyra.test'],
            [
                'name' => 'Test Account',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );
    }
}
