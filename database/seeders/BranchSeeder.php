<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::first();

        Branch::create([
            'company_id' => $company->id,
            'name' => 'Sucursal Principal',
            'address' => 'Av. Abraham Lincoln #456, Santo Domingo',
            'phone' => '+1-809-555-0200',
            'email' => 'principal@guardiapp-demo.com',
            'hours' => [
                'monday' => ['open' => '07:00', 'close' => '18:00'],
                'tuesday' => ['open' => '07:00', 'close' => '18:00'],
                'wednesday' => ['open' => '07:00', 'close' => '18:00'],
                'thursday' => ['open' => '07:00', 'close' => '18:00'],
                'friday' => ['open' => '07:00', 'close' => '18:00'],
            ],
            'capacity' => 50,
            'services' => ['daycare', 'education', 'meals', 'activities'],
            'status' => 'active',
        ]);

        Branch::create([
            'company_id' => $company->id,
            'name' => 'Sucursal Norte',
            'address' => 'Av. Máximo Gómez #789, Santiago',
            'phone' => '+1-809-555-0300',
            'email' => 'norte@guardiapp-demo.com',
            'hours' => [
                'monday' => ['open' => '07:00', 'close' => '17:00'],
                'tuesday' => ['open' => '07:00', 'close' => '17:00'],
                'wednesday' => ['open' => '07:00', 'close' => '17:00'],
                'thursday' => ['open' => '07:00', 'close' => '17:00'],
                'friday' => ['open' => '07:00', 'close' => '17:00'],
            ],
            'capacity' => 30,
            'services' => ['daycare', 'education'],
            'status' => 'active',
        ]);
    }
}
