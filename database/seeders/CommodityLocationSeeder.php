<?php

namespace Database\Seeders;

use App\Models\CommodityLocation;
use Illuminate\Database\Seeder;

class CommodityLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            'Kandang Petak 1',
            'Kandang Petak 2',
            'Kandang Petak 3',
            'Kandang Petak 4',
            'Gudang Pakan',
            'Gudang Obat & Vitamin',
            'Ruang Penyimpanan Peralatan',
            'Ruang Tetas Telur',
            'Tempat Penampungan Air',
            'Area Pengolahan Pakan',
            'Pos Keamanan / Satpam',
            'Ruang Istirahat Pekerja',
            'Ruang Kantor Peternakan',
            'Ruang Pendingin / Freezer',
            'Area Pengolahan Limbah',
            'Tempat Pembuangan Kotoran Ayam'
        ];

        for ($i = 0; $i < count($locations); $i++) {
            CommodityLocation::create([
                'name' => $locations[$i],
                'description' => 'Deskripsi ' . $locations[$i]
            ]);
        }
    }
}
