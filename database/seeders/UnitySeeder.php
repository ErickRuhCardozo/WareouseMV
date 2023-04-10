<?php

namespace Database\Seeders;

use App\Models\Unity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitySeeder extends Seeder
{
    public function run()
    {
        $unities = ['Sede (Jardim Carvalho', 'Jardim Ibirapuera', 'CT - Comunidade Terapêutica'];

        foreach ($unities as $unity) {
            Unity::create(['name' => $unity]);
        }
    }
}
