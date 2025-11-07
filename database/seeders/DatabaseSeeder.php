<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // First, seed roles and permissions
        $this->call(RolesAndPermissionsSeeder::class);

        // Create sample users for each role
        $adminUser = User::firstOrCreate([
            'email' => 'admin@pondokpancasila.sch.id'
        ], [
            'name' => 'Administrator',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $adminUser->assignRole('Admin');

        $teacherUser = User::firstOrCreate([
            'email' => 'teacher@pondokpancasila.sch.id'
        ], [
            'name' => 'Guru Contoh',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $teacherUser->assignRole('Teacher');

        $studentUser = User::firstOrCreate([
            'email' => 'student@pondokpancasila.sch.id'
        ], [
            'name' => 'Siswa Contoh',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $studentUser->assignRole('Student');

        $parentUser = User::firstOrCreate([
            'email' => 'parent@pondokpancasila.sch.id'
        ], [
            'name' => 'Orang Tua Contoh',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $parentUser->assignRole('Parent');
    }
}
