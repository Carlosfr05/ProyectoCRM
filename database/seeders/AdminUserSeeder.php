<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@crm.test'],
            [
                'name' => 'Administrador',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ]
        );

        $this->command->info('Usuario admin creado: admin@crm.test / admin123');
    }
}
