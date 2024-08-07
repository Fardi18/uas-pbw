<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kecamatans = [
            ['name' => 'Ciputat'],
            ['name' => 'Ciputan Timur'],
            ['name' => 'Pemulang'],
            ['name' => 'Pondok Aren'],
            ['name' => 'Serpong'],
            ['name' => 'Serpong Utara'],
        ];

        DB::table('kecamatans')->insert($kecamatans);
    }
}
