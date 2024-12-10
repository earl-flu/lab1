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
            [
                'name' => 'Rodriguez, Angeline, RMT',
                'license_number' => '0088604',
                'is_active' => true,
            ],
            [
                'name' => 'Haban, Ma. Rizza, RMT',
                'license_number' => '0060660',
                'is_active' => true,
            ],
            [
                'name' => 'Belaro, Hayley, RMT',
                'license_number' => '0022444',
                'is_active' => true,
            ],
            [
                'name' => 'Teves, Aubrey Jewel, RMT',
                'license_number' => '0117483',
                'is_active' => true,
            ],
            [
                'name' => 'Reyes, Josefina, RMT',
                'license_number' => '0025058',
                'is_active' => true,
            ],
            [
                'name' => 'Tatel, Maria Florentina, RMT',
                'license_number' => '0027998',
                'is_active' => true,
            ],
            [
                'name' => 'Collantes, Jessa, RMT',
                'license_number' => '0078519',
                'is_active' => true,
            ],
        ];

        // Insert the sample data
        foreach ($technologists as $technologist) {
            MedicalTechnologist::create($technologist);
        }
    }
}
