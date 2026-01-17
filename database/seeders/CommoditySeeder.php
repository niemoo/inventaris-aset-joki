<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commodity;
use Carbon\Carbon;

class CommoditySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commodities = [
            'Kandang Ayam',
            'Tempat Pakan',
            'Tempat Minum',
            'Lampu Pemanas',
            'Alat Semprot Desinfektan',
            'Timbangan Ayam',
            'Mesin Penggiling Pakan',
            'Tangki Air',
            'Genset',
            'Motor Pengangkut Pakan',
            'Keranjang Ayam',
            'Obat & Vitamin',
        ];

       $conditions = [
            'Layak',
            'Layak Sebagian',
            'Tidak Layak',
        ];

        foreach ($commodities as $commodity) {
            Commodity::create([
                'user_id' => 1,
                'commodity_category_id' => 1,
                'commodity_location_id' => rand(1, 10),
                'name' => $commodity,
                'condition' => $conditions[array_rand($conditions)],
            ]);
        }
    }
}
