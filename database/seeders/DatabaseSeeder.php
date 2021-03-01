<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Localizacion;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Categoria::factory(10)->create();
        Localizacion::factory(10)->create();
        Producto::factory(10)->create();
    }
}
