<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create super admin user
        $user = User::updateOrCreate(
            ['email' => 'superadmin@example.com'], // Check if exists
            [
                'name' => 'Super Admin',
                'password' => Hash::make('12345678'), // Change this!
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('=====================================');
        $this->command->info('✅ SUPER ADMIN CREATED SUCCESSFULLY');
        $this->command->info('=====================================');
        $this->command->line('');
        $this->command->info('📧 Email: superadmin@example.com');
        $this->command->info('🔑 Password: password');
        $this->command->line('');
        $this->command->warn('⚠️  IMPORTANT: Change this password after first login!');
        $this->command->line('');
    }
}