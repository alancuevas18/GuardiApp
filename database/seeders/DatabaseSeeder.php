<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Branch;
use App\Models\Company;
use App\Models\Kid;
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
        // Seed roles first
        $this->call(RoleSeeder::class);

        // Create demo company
        $company = Company::create([
            'name' => 'Demo Daycare',
            'slug' => 'demo-daycare',
            'email' => 'contact@demodaycare.com',
            'phone' => '+1234567890',
            'address' => '123 Main Street, City, State 12345',
            'active' => true,
        ]);

        // Create demo branch
        $branch = Branch::create([
            'company_id' => $company->id,
            'name' => 'Main Branch',
            'slug' => 'main-branch',
            'email' => 'main@demodaycare.com',
            'phone' => '+1234567891',
            'address' => '123 Main Street, City, State 12345',
            'active' => true,
        ]);

        // Create owner user
        $owner = User::create([
            'name' => 'Owner User',
            'email' => 'owner@demodaycare.com',
            'password' => Hash::make('password'),
            'company_id' => $company->id,
            'branch_id' => null,
            'phone' => '+1234567892',
        ]);
        $owner->assignRole('owner');

        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@demodaycare.com',
            'password' => Hash::make('password'),
            'company_id' => $company->id,
            'branch_id' => $branch->id,
            'phone' => '+1234567893',
        ]);
        $admin->assignRole('admin');

        // Create teacher user
        $teacher = User::create([
            'name' => 'Teacher User',
            'email' => 'teacher@demodaycare.com',
            'password' => Hash::make('password'),
            'company_id' => $company->id,
            'branch_id' => $branch->id,
            'phone' => '+1234567894',
        ]);
        $teacher->assignRole('teacher');

        // Create demo kids
        Kid::create([
            'company_id' => $company->id,
            'branch_id' => $branch->id,
            'first_name' => 'Emma',
            'last_name' => 'Johnson',
            'birth_date' => '2020-03-15',
            'allergies' => 'Peanuts',
            'medical_notes' => 'Regular checkups needed',
            'emergency_contact' => 'Jane Johnson: +1234567895',
            'active' => true,
        ]);

        Kid::create([
            'company_id' => $company->id,
            'branch_id' => $branch->id,
            'first_name' => 'Liam',
            'last_name' => 'Smith',
            'birth_date' => '2019-07-22',
            'allergies' => null,
            'medical_notes' => null,
            'emergency_contact' => 'John Smith: +1234567896',
            'active' => true,
        ]);

        Kid::create([
            'company_id' => $company->id,
            'branch_id' => $branch->id,
            'first_name' => 'Olivia',
            'last_name' => 'Williams',
            'birth_date' => '2021-01-10',
            'allergies' => 'Lactose',
            'medical_notes' => 'Asthma inhaler available',
            'emergency_contact' => 'Sarah Williams: +1234567897',
            'active' => true,
        ]);
    }
}
