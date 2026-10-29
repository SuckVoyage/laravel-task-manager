<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::query()->create(['name' => 'Admin']);
        Role::query()->create(['name' => 'Moderator']);
        Role::query()->create(['name' => 'User']);
    }
}
