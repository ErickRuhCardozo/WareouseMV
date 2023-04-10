<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'password' => '$2y$10$HXYAEdhden5luHr50r/S6eF2BfCBRHjizCqeKr6/wTKlF.VWwwppy',
            'role_id' => UserRole::IS_ADMIN,
            'unity_id' => rand(1, 3),
        ]);

        User::create([
            'name' => 'Gerenciador',
            'password' => '$2y$10$HXYAEdhden5luHr50r/S6eF2BfCBRHjizCqeKr6/wTKlF.VWwwppy',
            'role_id' => UserRole::IS_MANAGER,
            'unity_id' => rand(1, 3),
        ]);

        User::create([
            'name' => 'Register',
            'password' => '$2y$10$HXYAEdhden5luHr50r/S6eF2BfCBRHjizCqeKr6/wTKlF.VWwwppy',
            'role_id' => UserRole::IS_REGISTER,
            'unity_id' => rand(1, 3),
        ]);
    }
}
