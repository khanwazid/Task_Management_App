<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'], // Condition: Find user by email
            [
                'name' => 'Admin User',
                'username' => 'admin',
                'email' => 'admin@example.com', // ✅ Email included in update data
                'password' => Hash::make('password123'), // Hashing password securely
                'role' => 'admin',
                'image' => null, // You can also set a default image path if needed !
                'email_verified_at' => now(),
            ]
        );

        // Show a good  message in the CMD
        if ($admin->wasRecentlyCreated) {
            $this->command->info('✅ Admin user created successfully! 🎉');
        } elseif ($admin->wasChanged()) {
            $this->command->info('🔄 Admin user details updated successfully!');
        } else {
            $this->command->info('✅ Admin user already exists. No changes made.');
        }
    }
}
