<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Finanza', 'Tecnologia', 'Formazione', 'Geopolitica', 'Commercio'];


        foreach($categories as $category){
            Category::create([
                "name"=> $category,
                "slug"=> Str::slug($category)
            ]);
        }
    }
}
