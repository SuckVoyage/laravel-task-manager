<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create(['name' => 'test', 'email' => 'test@email.ru', 'password' => '12345678']);
        User::query()->create(['name' => 'admin', 'email' => 'admin@email.ru', 'password' => '12345678']);
    }
}
