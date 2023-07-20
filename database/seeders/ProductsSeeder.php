<?php

namespace Database\Seeders;

use App\Models\Admin\Products;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::factory()->count(10)->create();
        //
    }
}
