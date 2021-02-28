<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Localizacion;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => $this->faker->numerify('# ##### #####'),
            'modelo' => 'MODELO' . $this->faker->randomDigitNotNull,
            'fabricante' => $this->faker->company,
            'descripcion' => $this->faker->text(200),
            'imagen' => '',
            'stock' => $this->faker->randomDigit,
            'estado' => $this->faker->randomElement([
                'activo',
                'roto',
                'desaparecido'
            ]),
            'localizacion_id' => Localizacion::all()->random()->id,
            'categoria_id' => Categoria::all()->random()->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
