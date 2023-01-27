<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = [
            ['name_tm' => 'Jaylar', 'name_en' => 'Restorans', 1],
            ['name_tm' => 'Kafelar', 'name_en' => 'Cafes', 2],
            ['name_tm' => 'Magazynlar', 'name_en' => 'Shops', 3],
        ];

        for ($i=0; $i < count($objs); $i++) {
            PropertyType::create([
                'name_tm' => $objs[$i]['name_tm'],
                'name_en' => $objs[$i]['name_en'],
                'sort_order' => $i + 1
            ]);
        }
    }
}
