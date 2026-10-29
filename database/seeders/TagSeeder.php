<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::query()->create(['name' => 'Полезно']);
        Tag::query()->create(['name' => 'Круто']);
        Tag::query()->create(['name' => 'Чушь']);
        Tag::query()->create(['name' => 'Супер']);
        Tag::query()->create(['name' => 'Не помогло']);
    }
}
