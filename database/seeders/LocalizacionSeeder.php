<?php

namespace Database\Seeders;

use App\Models\Localizacion;
use Illuminate\Database\Seeder;

class LocalizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Localizacion::factory()
        ->count(15)
        ->create();
    }
}
