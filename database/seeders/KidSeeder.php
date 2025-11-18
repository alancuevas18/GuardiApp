<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Kid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branch1 = Branch::where('name', 'Sucursal Principal')->first();
        $branch2 = Branch::where('name', 'Sucursal Norte')->first();

        Kid::create([
            'first_name' => 'Juan',
            'last_name' => 'López',
            'dob' => now()->subYears(3)->format('Y-m-d'),
            'gender' => 'male',
            'address' => 'Calle Duarte #45, Santo Domingo',
            'emergency_contacts' => [
                ['name' => 'Roberto López', 'phone' => '+1-809-555-1001', 'relationship' => 'Father'],
                ['name' => 'Carmen López', 'phone' => '+1-809-555-1002', 'relationship' => 'Mother'],
            ],
            'medical_info' => [
                'blood_type' => 'O+',
                'insurance' => 'Seguro Universal',
                'doctor' => 'Dr. Martínez',
            ],
            'allergies' => 'Ninguna',
            'notes' => 'Le gusta jugar con bloques',
            'branch_id' => $branch1->id,
        ]);

        Kid::create([
            'first_name' => 'María',
            'last_name' => 'Sánchez',
            'dob' => now()->subYears(4)->format('Y-m-d'),
            'gender' => 'female',
            'address' => 'Av. 27 de Febrero #123, Santo Domingo',
            'emergency_contacts' => [
                ['name' => 'Luis Sánchez', 'phone' => '+1-809-555-2001', 'relationship' => 'Father'],
            ],
            'medical_info' => [
                'blood_type' => 'A+',
                'insurance' => 'Humano',
            ],
            'allergies' => 'Alergia a los cacahuetes',
            'branch_id' => $branch1->id,
        ]);

        Kid::create([
            'first_name' => 'Carlos',
            'last_name' => 'Rodríguez',
            'dob' => now()->subYears(2)->format('Y-m-d'),
            'gender' => 'male',
            'address' => 'Calle El Sol #67, Santiago',
            'emergency_contacts' => [
                ['name' => 'Ana Rodríguez', 'phone' => '+1-809-555-3001', 'relationship' => 'Mother'],
            ],
            'medical_info' => [
                'blood_type' => 'B+',
            ],
            'branch_id' => $branch2->id,
        ]);

        Kid::create([
            'first_name' => 'Sofía',
            'last_name' => 'Gómez',
            'dob' => now()->subYears(3)->subMonths(6)->format('Y-m-d'),
            'gender' => 'female',
            'address' => 'Calle Primera #89, Santo Domingo',
            'emergency_contacts' => [
                ['name' => 'Pedro Gómez', 'phone' => '+1-809-555-4001', 'relationship' => 'Father'],
                ['name' => 'Rosa Gómez', 'phone' => '+1-809-555-4002', 'relationship' => 'Mother'],
            ],
            'medical_info' => [
                'blood_type' => 'O-',
                'insurance' => 'ARS Palic',
            ],
            'notes' => 'Muy activa, le encanta pintar',
            'branch_id' => $branch1->id,
        ]);
    }
}
