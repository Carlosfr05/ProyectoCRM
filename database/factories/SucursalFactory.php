<?php

namespace Database\Factories;

use App\Models\Sucursal;
use Illuminate\Database\Eloquent\Factories\Factory;

class SucursalFactory extends Factory
{
    protected $model = Sucursal::class;

    public function definition(): array
    {
        return [
            'nombre' => 'Sucursal ' . $this->faker->citySuffix(),
            'ciudad' => $this->faker->city(),
            'estado' => $this->faker->state(),
            'codigo_postal' => $this->faker->postcode(),
            'direccion' => $this->faker->address(),
            'telefono' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->companyEmail(),
            'horario_apertura' => '08:00',
            'horario_cierre' => '18:00',
            'gerente' => $this->faker->name(),
        ];
    }
}
