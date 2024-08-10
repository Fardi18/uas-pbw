<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specialist;

class SpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialists = [
            'Bengkel Umum',
            'Spesialis Mesin',
            'Ban',
            'Transmisi',
            'AC',
            'Kelistrikan',
            'Kaki-kaki',
            'Body Repair dan Cat',
            'Custom dan Restorasi',
            'Audio Aksesoris',
        ];

        foreach ($specialists as $specialist) {
            Specialist::create(['name' => $specialist]);
        }
    }
}
