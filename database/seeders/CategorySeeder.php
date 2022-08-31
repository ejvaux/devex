<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Indirect Materials',
            'Direct Materials'
        ];
        foreach ($names as $name) {
            DB::table('categories')->insert([
                'name' => $name
            ]);
        }
    }
}
