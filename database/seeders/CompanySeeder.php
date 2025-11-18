<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name_legal' => 'GuardiApp Demo S.R.L.',
            'trade_name' => 'GuardiApp Demo Daycare',
            'company_type' => 'daycare',
            'rnc' => '123456789',
            'phone_primary' => '+1-809-555-0100',
            'phone_office' => '+1-809-555-0101',
            'phone_emergency' => '+1-809-555-0102',
            'address' => 'Calle Principal #123, Santo Domingo, República Dominicana',
            'email' => 'info@guardiapp-demo.com',
            'timezone' => 'America/Santo_Domingo',
            'locale' => 'es',
            'currency' => 'DOP',
            'status' => 'active',
        ]);
    }
}
