<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Category $category)
    {
        $category->create(['type' => 'cash-flow', 'name' => 'tithes', 'slug' => 'tithes']);
        $category->create(['type' => 'cash-flow', 'name' => 'dues', 'slug' => 'dues']);

        $category->create(['type' => 'utility', 'name' => 'water bill', 'slug' => 'water-bill']);
        $category->create(['type' => 'utility', 'name' => 'light bill', 'slug' => 'light-bill']);
    }
}
