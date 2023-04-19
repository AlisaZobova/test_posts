<?php

namespace App\Observers;

use App\Models\Tag;

class TagObserver
{
    public function deleted(Tag $tag): void
    {
        $tag->posts()->each(
            function ($post) {
                $post->tag()->dissociate();
                $post->save();
            }
        );
    }
}
