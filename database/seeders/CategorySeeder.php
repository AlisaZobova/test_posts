<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scienceCategory = Category::create([
            'category_name' => 'Science'
        ]);

        $mathCategory = Category::create([
            'category_name' => 'Math',
            'ancestor_id' => $scienceCategory->id
        ]);

        $categories = ['Algebra', 'Geometry'];

        foreach ($categories as $category) {
            Category::create([
                'category_name' => $category,
                'ancestor_id' => $mathCategory->id
            ]);
        }
    }
}
