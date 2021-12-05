<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name'=>'sport'],
            ['name'=>'Food'],
            ['name'=>'travel'],
            ['name'=>'entertainment'],
            ['name'=>'business'],
            ['name'=>'news'],
        ]);
    }
}
