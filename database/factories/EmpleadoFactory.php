<?php

namespace Database\Factories;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{
    protected $model = Empleado::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->phoneNumber(),
            'direccion' => $this->faker->address(),
            'puesto' => $this->faker->randomElement(['Desarrollador', 'Administrador', 'Soporte', 'Vendedor', 'Gerente']),
            'salario' => $this->faker->randomFloat(2, 800, 6000),
            'fecha_contratacion' => $this->faker->date(),
        ];
    }
}
