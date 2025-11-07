<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions array
        $permissions = [
            // CBT Permissions
            'create tests',
            'edit tests',
            'delete tests',
            'view tests',
            'take tests',
            'view test results',

            // Attendance Permissions
            'mark attendance',
            'view attendance reports',
            'manage own attendance',

            // Admission Permissions
            'manage admissions',
            'view admissions',
            'submit admission',

            // User Management Permissions
            'manage users',
            'view users',
            'manage own profile',

            // Report Permissions
            'view reports',
            'generate reports',
            'export reports',

            // System Permissions
            'access admin panel',
            'manage system settings',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions

        // Admin role - has all permissions
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $adminRole->givePermissionTo(Permission::all());

        // Teacher role
        $teacherRole = Role::firstOrCreate(['name' => 'Teacher']);
        $teacherRole->givePermissionTo([
            'create tests',
            'edit tests',
            'delete tests',
            'view tests',
            'view test results',
            'mark attendance',
            'view attendance reports',
            'manage own attendance',
            'view admissions',
            'view reports',
            'generate reports',
            'export reports',
            'manage own profile',
        ]);

        // Student role
        $studentRole = Role::firstOrCreate(['name' => 'Student']);
        $studentRole->givePermissionTo([
            'take tests',
            'view test results',
            'manage own attendance',
            'view reports',
            'manage own profile',
        ]);

        // Parent role
        $parentRole = Role::firstOrCreate(['name' => 'Parent']);
        $parentRole->givePermissionTo([
            'view test results',
            'view attendance reports',
            'view reports',
            'manage own profile',
        ]);
    }
}