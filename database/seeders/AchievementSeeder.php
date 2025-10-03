<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Achievement;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $achievements = [
            [
                'name' => 'Primer Paso',
                'description' => 'Completa tu registro en el Huerto Virtual',
                'icon' => '🌱',
                'points_reward' => 10,
                'type' => 'registration',
                'conditions' => null,
                'is_active' => true,
            ],
            [
                'name' => 'Nivel 5',
                'description' => 'Alcanza el nivel 5',
                'icon' => '⭐',
                'points_reward' => 50,
                'type' => 'level',
                'conditions' => ['min_level' => 5],
                'is_active' => true,
            ],
            [
                'name' => 'Nivel 10',
                'description' => 'Alcanza el nivel 10',
                'icon' => '🌟',
                'points_reward' => 100,
                'type' => 'level',
                'conditions' => ['min_level' => 10],
                'is_active' => true,
            ],
            [
                'name' => 'Puntos Altos',
                'description' => 'Consigue 500 puntos',
                'icon' => '🏆',
                'points_reward' => 25,
                'type' => 'points',
                'conditions' => ['min_points' => 500],
                'is_active' => true,
            ],
            [
                'name' => 'Granjero Experto',
                'description' => 'Consigue 1000 puntos',
                'icon' => '👨‍🌾',
                'points_reward' => 50,
                'type' => 'points',
                'conditions' => ['min_points' => 1000],
                'is_active' => true,
            ],
            [
                'name' => 'Primera Planta',
                'description' => 'Planta tu primera semilla',
                'icon' => '🌿',
                'points_reward' => 20,
                'type' => 'planting',
                'conditions' => ['min_plants' => 1],
                'is_active' => true,
            ],
            [
                'name' => 'Agricultor Dedicado',
                'description' => 'Planta 10 semillas',
                'icon' => '🌾',
                'points_reward' => 75,
                'type' => 'planting',
                'conditions' => ['min_plants' => 10],
                'is_active' => true,
            ],
            [
                'name' => 'Primera Cosecha',
                'description' => 'Recolecta tu primera cosecha',
                'icon' => '🥕',
                'points_reward' => 30,
                'type' => 'harvesting',
                'conditions' => ['min_harvests' => 1],
                'is_active' => true,
            ],
            [
                'name' => 'Cosecha Abundante',
                'description' => 'Recolecta 25 cosechas',
                'icon' => '🧺',
                'points_reward' => 100,
                'type' => 'harvesting',
                'conditions' => ['min_harvests' => 25],
                'is_active' => true,
            ],
            [
                'name' => 'Constancia',
                'description' => 'Visita el huerto 7 días seguidos',
                'icon' => '📅',
                'points_reward' => 60,
                'type' => 'streak',
                'conditions' => ['min_streak' => 7],
                'is_active' => true,
            ],
        ];

        foreach ($achievements as $achievement) {
            Achievement::create($achievement);
        }
    }
}
