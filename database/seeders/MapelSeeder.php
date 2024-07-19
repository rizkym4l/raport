<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapels = [
            ['nama' => 'Matematika', 'kode_mapel' => 'MATH'],
            ['nama' => 'Bahasa Indonesia', 'kode_mapel' => 'INDO'],
            ['nama' => 'Bahasa Inggris', 'kode_mapel' => 'ENG'],
            ['nama' => 'IPA', 'kode_mapel' => 'SCI'],
            ['nama' => 'IPS', 'kode_mapel' => 'SOC'],
            ['nama' => 'Pendidikan Agama', 'kode_mapel' => 'REL'],
            ['nama' => 'Pendidikan Kewarganegaraan', 'kode_mapel' => 'CIV'],
            ['nama' => 'Seni Budaya', 'kode_mapel' => 'ART'],
            ['nama' => 'Pendidikan Jasmani', 'kode_mapel' => 'PE'],
            ['nama' => 'Teknologi Informasi', 'kode_mapel' => 'IT'],
        ];

        DB::table('mapel')->insert($mapels);
    }
}
