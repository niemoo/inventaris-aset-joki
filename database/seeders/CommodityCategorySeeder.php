<?php

namespace Database\Seeders;

use App\Models\CommodityCategory;
use Illuminate\Database\Seeder;

class CommodityCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CommodityCategory::create([
            'name' => 'Peralatan Peternakan Ayam',
            'description' => 'Alat dan perlengkapan yang digunakan untuk usaha peternakan ayam.'
        ]);

        CommodityCategory::create([
            'name' => 'Peralatan Perikanan',
            'description' => 'Alat dan perlengkapan yang digunakan untuk usaha budidaya ikan.'
        ]);

        CommodityCategory::create([
            'name' => 'Prasarana Umum',
            'description' => 'Bangunan, fasilitas, dan sarana penunjang usaha peternakan & perikanan.'
        ]);

        CommodityCategory::create([
            'name' => 'Obat & Vitamin',
            'description' => 'Obat, vaksin, dan vitamin untuk kesehatan ayam dan ikan.'
        ]);
    }
}
