<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    public function deleted(Category $category): void
    {
        $category->posts()->each(
            function ($post) {
                $post->delete();
            }
        );
        $category->children()->each(
            function ($child) {
                $child->delete();
            }
        );
    }
}
