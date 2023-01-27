<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = [
            ['name_tm' => 'Gat', 'name_en' => 'Floor', 'sort_order' => 1, 'values' => [
                ['name_tm' => '1', 'name_en' => null, 'sort_order' => 1],
                ['name_tm' => '2', 'name_en' => null, 'sort_order' => 2],
                ['name_tm' => '3', 'name_en' => null, 'sort_order' => 3],
                ['name_tm' => '4', 'name_en' => null, 'sort_order' => 4],
                ['name_tm' => '5', 'name_en' => null, 'sort_order' => 5],
                ['name_tm' => '6', 'name_en' => null, 'sort_order' => 6],
                ['name_tm' => '7', 'name_en' => null, 'sort_order' => 7],
                ['name_tm' => '8', 'name_en' => null, 'sort_order' => 8],
                ['name_tm' => '9', 'name_en' => null, 'sort_order' => 9],
                ['name_tm' => '10', 'name_en' => null, 'sort_order' => 10],
            ]],
            ['name_tm' => 'Otag', 'name_en' => 'Room', 'sort_order' => 1, 'values' => [
                ['name_tm' => '1', 'name_en' => null, 'sort_order' => 1],
                ['name_tm' => '2', 'name_en' => null, 'sort_order' => 2],
                ['name_tm' => '3', 'name_en' => null, 'sort_order' => 3],
                ['name_tm' => '4', 'name_en' => null, 'sort_order' => 4],
                ['name_tm' => '5', 'name_en' => null, 'sort_order' => 5],
                ['name_tm' => '6', 'name_en' => null, 'sort_order' => 6],
                ['name_tm' => '7', 'name_en' => null, 'sort_order' => 7],
                ['name_tm' => '8', 'name_en' => null, 'sort_order' => 8],
                ['name_tm' => '9', 'name_en' => null, 'sort_order' => 9],
                ['name_tm' => '10', 'name_en' => null, 'sort_order' => 10],
            ]],
            ['name_tm' => 'Hammam', 'name_en' => 'Bathroom', 'sort_order' => 1,'values' => [
                ['name_tm' => '1', 'name_en' => null, 'sort_order' => 1],
                ['name_tm' => '2', 'name_en' => null, 'sort_order' => 2],
                ['name_tm' => '3', 'name_en' => null, 'sort_order' => 3],
                ['name_tm' => '4', 'name_en' => null, 'sort_order' => 4],
            ]]
        ];

        for ($i = 0; $i < count($objs); $i++) {
            Option::create([
                'name_tm' => $objs[$i]['name_tm'],
                'name_en' => $objs[$i]['name_en'],
                'sort_order' => $objs[$i]['sort_order'],
            ]);

            for ($j = 0; $j < count($objs[$i]['values']); $j++) {
                Option::create([
                    'name_tm' => $objs[$i]['values'][$j]['name_tm'],
                    'name_en' => $objs[$i]['values'][$j]['name_en'],
                    'sort_order' => $objs[$i]['values'][$j]['sort_order'],
                ]);
            }
        }
    }
}
