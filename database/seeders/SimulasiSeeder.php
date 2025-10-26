<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SimulasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('simulasis')->truncate();

        $data = [
            ['golongan' => 'Rumah Tangga (R1)', 'tarif_0_10' => 7900, 'tarif_11_20' => 9400, 'tarif_21' => 11200],
            ['golongan' => 'Instansi Pemerintahan (P2)', 'tarif_0_10' => 8700, 'tarif_11_20' => 10500, 'tarif_21' => 12600],
            ['golongan' => 'Abri', 'tarif_0_10' => 330, 'tarif_11_20' => 495, 'tarif_21' => 660],
            ['golongan' => 'Niaga Kecil (N1)', 'tarif_0_10' => 12200, 'tarif_11_20' => 13700, 'tarif_21' => 16200],
            ['golongan' => 'Niaga Besar (N3)', 'tarif_0_10' => 15200, 'tarif_11_20' => 16700, 'tarif_21' => 19200],
            ['golongan' => 'Industri Kecil (I1)', 'tarif_0_10' => 19200, 'tarif_11_20' => 23700, 'tarif_21' => 28200],
            ['golongan' => 'Industri Besar (I2)', 'tarif_0_10' => 21700, 'tarif_11_20' => 29100, 'tarif_21' => 41000],
            ['golongan' => 'Sosial Umum (S1)', 'tarif_0_10' => 1400, 'tarif_11_20' => 2300, 'tarif_21' => 3500],
            ['golongan' => 'Rumah Tangga (R2)', 'tarif_0_10' => 8400, 'tarif_11_20' => 9700, 'tarif_21' => 11500],
            ['golongan' => 'Rumah Tangga (R3)', 'tarif_0_10' => 8600, 'tarif_11_20' => 10300, 'tarif_21' => 12400],
            ['golongan' => 'Rumah Tangga (R4)', 'tarif_0_10' => 8800, 'tarif_11_20' => 10500, 'tarif_21' => 12600],
            ['golongan' => 'Sekolah (P1)', 'tarif_0_10' => 8700, 'tarif_11_20' => 10500, 'tarif_21' => 12600],
            ['golongan' => 'Niaga Menengah (N2)-Villa', 'tarif_0_10' => 13700, 'tarif_11_20' => 15200, 'tarif_21' => 17700],
            ['golongan' => 'Sosial Khusus (S2)', 'tarif_0_10' => 2400, 'tarif_11_20' => 3300, 'tarif_21' => 4500],
            ['golongan' => 'RT Sangat Sederhana/MBR (S3)', 'tarif_0_10' => 2400, 'tarif_11_20' => 3300, 'tarif_21' => 4500],
            ['golongan' => 'Non Komersil (K1)', 'tarif_0_10' => 55000, 'tarif_11_20' => 55000, 'tarif_21' => 55000],
            ['golongan' => 'Komersil (K2)', 'tarif_0_10' => 55000, 'tarif_11_20' => 55000, 'tarif_21' => 55000],
        ];

        DB::table('simulasis')->insert($data);
    }
}
