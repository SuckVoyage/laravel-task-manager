<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tagIds = Tag::query()->pluck('id');
        $posts = Post::all();

        foreach ($posts as $post) {
            $randomTagIds = $tagIds
                ->random(min(3, $tagIds->count()))
                ->all();

            $post->tags()->sync($randomTagIds);
        }
    }
}
