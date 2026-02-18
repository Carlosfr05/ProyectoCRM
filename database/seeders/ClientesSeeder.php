<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clientes;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = [
            ['nombre' => 'María Pérez', 'email' => 'maria.perez@example.com', 'telefono' => '555-0101', 'direccion' => 'Calle Falsa 123'],
            ['nombre' => 'Juan García', 'email' => 'juan.garcia@example.com', 'telefono' => '555-0102', 'direccion' => 'Av. Central 45'],
            ['nombre' => 'Lucía Fernández', 'email' => 'lucia.fernandez@example.com', 'telefono' => '555-0103', 'direccion' => 'Paseo del Sol 7'],
            ['nombre' => 'Carlos López', 'email' => 'carlos.lopez@example.com', 'telefono' => '555-0104', 'direccion' => 'Boulevard Norte 88'],
            ['nombre' => 'Ana Martínez', 'email' => 'ana.martinez@example.com', 'telefono' => '555-0105', 'direccion' => 'Plaza Mayor 10'],
        ];

        foreach ($clientes as $c) {
            Clientes::create($c);
        }
    }
}
