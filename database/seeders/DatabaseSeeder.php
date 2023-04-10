<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        (new UnitySeeder)();
        (new UserRoleSeeder)();
        (new UserSeeder)();
        (new ProductCategorySeeder)();
        (new ProductSeeder)();
    }
}
