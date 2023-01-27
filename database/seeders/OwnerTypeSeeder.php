<?php

namespace Database\Seeders;


use App\Models\OwnerType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = [
            ['name_tm' => 'Hususy', 'name_en' => 'Own'],
            ['name_tm' => 'Hökümet', 'name_en' => 'Goverment'],
        ];

        for ($i=0; $i < count($objs); $i++) {
            OwnerType::create([
                'name_tm' => $objs[$i]['name_tm'],
                'name_en' => $objs[$i]['name_en'],
            ]);
        }
    }
}
