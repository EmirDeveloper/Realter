<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Emir',
            'username' => 'Emir',
            'password' => bcrypt('nazarow'),
            'permissions' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
        ]);
    }
}
