<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $assigments = [
            'admin@email.ru' => 'Admin',
            'moderator@email.ru' => 'Moderator',
            'user@email.ru' => 'User',
        ];

        foreach($assigments as $email => $roleName){
            $user = User::query()->where('email', $email)->firstOrFail();
            $role = Role::query()->where('name', $roleName)->firstOrFail();

            $user->roles()->syncWithoutDetaching([$role->id]);
        }
    }
}
