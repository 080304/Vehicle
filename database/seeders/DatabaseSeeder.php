<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Membuat peran jika belum ada
        if (!Role::where('name', 'Admin')->exists()) {
            Role::create(['name' => 'Admin', 'guard_name' => 'web']);
        }

        if (!Role::where('name', 'Approver')->exists()) {
            Role::create(['name' => 'Approver', 'guard_name' => 'web']);
        }

        // Membuat pengguna jika belum ada
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
            ]
        );
        $admin->assignRole('Admin');

        $approver = User::firstOrCreate(
            ['email' => 'approver@example.com'],
            [
                'name' => 'Approver User',
                'password' => bcrypt('password'),
            ]
        );
        $approver->assignRole('Approver');
    }
}
