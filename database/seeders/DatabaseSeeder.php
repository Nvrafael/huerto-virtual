<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ejecutar seeders
        $this->call([
            RoleSeeder::class,
            AchievementSeeder::class,
        ]);

        // Crear usuario administrador
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@huerto-virtual.com',
            'password' => bcrypt('password'),
            'bio' => 'Administrador del sistema',
            'points' => 0,
            'level' => 1,
            'experience' => 0,
        ]);
        $admin->assignRole('administrador');

        // Crear usuario de prueba
        $user = User::create([
            'name' => 'Usuario Demo',
            'email' => 'demo@huerto-virtual.com',
            'password' => bcrypt('password'),
            'bio' => 'Usuario de demostración',
            'points' => 150,
            'level' => 2,
            'experience' => 150,
        ]);
        $user->assignRole('usuario');
    }
}
