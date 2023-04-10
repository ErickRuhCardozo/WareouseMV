<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        UserRole::create([
            'id' => UserRole::IS_ADMIN,
            'name' => 'Administrador'
        ]);

        UserRole::create([
            'id' => UserRole::IS_MANAGER,
            'name' => 'Gerenciador'
        ]);

        UserRole::create([
            'id' => UserRole::IS_REGISTER,
            'name' => 'Registrador'
        ]);
    }
}
