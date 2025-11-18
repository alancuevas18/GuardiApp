<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::first();
        $branch1 = Branch::where('name', 'Sucursal Principal')->first();
        $branch2 = Branch::where('name', 'Sucursal Norte')->first();

        // Owner User
        $owner = User::create([
            'name' => 'Carlos Martínez',
            'first_name' => 'Carlos',
            'last_name' => 'Martínez',
            'email' => 'owner@guardiapp.com',
            'password' => Hash::make('password'),
            'company_id' => $company->id,
            'position' => 'Owner',
            'status' => 'active',
            'hire_date' => now()->subYears(5),
        ]);
        $owner->assignRole('owner');

        // Admin User
        $admin = User::create([
            'name' => 'María García',
            'first_name' => 'María',
            'last_name' => 'García',
            'email' => 'admin@guardiapp.com',
            'password' => Hash::make('password'),
            'company_id' => $company->id,
            'branch_id' => $branch1->id,
            'position' => 'Administrator',
            'status' => 'active',
            'hire_date' => now()->subYears(3),
        ]);
        $admin->assignRole('admin');

        // Branch Manager
        $manager = User::create([
            'name' => 'Pedro Ramírez',
            'first_name' => 'Pedro',
            'last_name' => 'Ramírez',
            'email' => 'manager@guardiapp.com',
            'password' => Hash::make('password'),
            'company_id' => $company->id,
            'branch_id' => $branch1->id,
            'position' => 'Branch Manager',
            'status' => 'active',
            'hire_date' => now()->subYears(2),
        ]);
        $manager->assignRole('branch_manager');

        // Update branch manager
        $branch1->update(['manager_user_id' => $manager->id]);

        // Teacher
        $teacher = User::create([
            'name' => 'Ana Pérez',
            'first_name' => 'Ana',
            'last_name' => 'Pérez',
            'email' => 'teacher@guardiapp.com',
            'password' => Hash::make('password'),
            'company_id' => $company->id,
            'branch_id' => $branch1->id,
            'position' => 'Teacher',
            'status' => 'active',
            'hire_date' => now()->subYear(),
        ]);
        $teacher->assignRole('teacher');

        // Nurse
        $nurse = User::create([
            'name' => 'Laura Fernández',
            'first_name' => 'Laura',
            'last_name' => 'Fernández',
            'email' => 'nurse@guardiapp.com',
            'password' => Hash::make('password'),
            'company_id' => $company->id,
            'branch_id' => $branch1->id,
            'position' => 'Nurse',
            'status' => 'active',
            'hire_date' => now()->subMonths(6),
        ]);
        $nurse->assignRole('nurse');

        // Parent
        $parent = User::create([
            'name' => 'Roberto López',
            'first_name' => 'Roberto',
            'last_name' => 'López',
            'email' => 'parent@guardiapp.com',
            'password' => Hash::make('password'),
            'company_id' => $company->id,
            'position' => 'Parent',
            'status' => 'active',
        ]);
        $parent->assignRole('parent');

        // Assistant - Branch 2
        $assistant = User::create([
            'name' => 'Sofía Torres',
            'first_name' => 'Sofía',
            'last_name' => 'Torres',
            'email' => 'assistant@guardiapp.com',
            'password' => Hash::make('password'),
            'company_id' => $company->id,
            'branch_id' => $branch2->id,
            'position' => 'Assistant',
            'status' => 'active',
            'hire_date' => now()->subMonths(3),
        ]);
        $assistant->assignRole('assistant');
    }
}
