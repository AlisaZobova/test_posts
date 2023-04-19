<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tags = Tag::all(['id'])->toArray();
        $index = array_rand($tags);
        $tag = $tags[$index]['id'];

        $categories = Category::all(['id'])->toArray();
        $index = array_rand($categories);
        $category = $categories[$index]['id'];

        return [
            'tag_id' => $tag,
            'category_id' => $category,
            'title' => ucfirst(fake()->word()),
            'description' => fake()->sentence(),
            'publication_date' => now()
        ];
    }
}
