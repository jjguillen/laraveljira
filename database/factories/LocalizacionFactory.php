<?php

namespace Database\Factories;

use App\Models\Localizacion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocalizacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Localizacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ciudad' => $this->faker->city,
            'nombre_edificio' => 'Edificio ' . $this->faker->word,
            'direccion_edificio' => $this->faker->address,
            'numero_sala' => $this->faker->randomDigitNot(0),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
