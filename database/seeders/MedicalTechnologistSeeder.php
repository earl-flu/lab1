<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MedicalTechnologist;
use Illuminate\Support\Facades\DB;

class MedicalTechnologistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample medical technologists
        $technologists = [
            [
                'name' => 'Tesorero, Malu S, RMT',
                'license_number' => '0035915',
                'is_active' => true,
            ],
        ];

        // Insert the sample data
        foreach ($technologists as $technologist) {
            MedicalTechnologist::create($technologist);
        }
    }
}
