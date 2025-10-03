<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario de prueba
        $user = User::updateOrCreate(
            ['email' => 'test@test.com'],
            [
                'name' => 'Usuario Test',
                'password' => Hash::make('password'),
                'points' => 150,
                'level' => 3,
                'experience' => 250,
                'bio' => 'Usuario de prueba para desarrollo',
            ]
        );

        // Asignar rol de usuario
        $userRole = Role::where('name', 'usuario')->first();
        if ($userRole && !$user->hasRole('usuario')) {
            $user->assignRole($userRole);
        }

        $this->command->info('Usuario de prueba creado: test@test.com / password');
    }
}
