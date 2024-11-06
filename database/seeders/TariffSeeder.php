<?php

namespace Database\Seeders;

use App\Models\Tariff;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TariffSeeder extends Seeder
{

    public function run()
    {
        Tariff::updateOrCreate(['building_type' => 'Residential'], [
            'rate_for_first_200_kwh' => 0.45,
            'rate_above_200_kwh' => 0.97,
        ]);
    
        Tariff::updateOrCreate(['building_type' => 'Commercial'], [
            'rate_for_first_200_kwh' => 0.89,
            'rate_above_200_kwh' => 1.13,
        ]);
    }
    
}
