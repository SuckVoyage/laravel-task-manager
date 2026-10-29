<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'Вопрос' => 'Как создать модель',
                'Ответ' => 'php artisan make:model название',
                'Полезные поля' => '$fillable, $timestamps, $table'
            ],
            [
                'Вопрос' => 'Как создать миграцию',
                'Ответ' => 'php artisan make:migration название',
                'Применение' => 'php artisan migtrate',
                'Откатить миграцию' => 'php artisan migrate:rollback (--step=1)'
            ],
            [
                'Вопрос' => 'Как создать компонент',
                'Ответ' => 'php artisan make:component название (--view),
                            php artisan make:livewire имя-компонента',
            ],
        ];

        $users = User::all();
        $counter = 0;
        foreach ($users as $user){
            foreach($posts[$counter] as $title => $content){
                $user->posts()->create(['title' => $title, 'content' => $content]);
            }
            $counter++;
        }
    }
}
