<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->words(3, true),
            'descripcion' => $this->faker->paragraph(),
            'precio' => $this->faker->randomFloat(2, 10, 1000),
            'cantidad' => $this->faker->numberBetween(1, 100),
            'sku' => $this->faker->unique()->ean8(),
            'categoria' => $this->faker->randomElement(['Electrónica', 'Ropa', 'Alimentos', 'Libros', 'Deportes', 'Hogar']),
        ];
    }
}
