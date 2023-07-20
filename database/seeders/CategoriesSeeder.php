<?php

namespace Database\Seeders;

use App\Models\Admin\Categories;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::factory()->count(5)->create();
        //
    }
}
