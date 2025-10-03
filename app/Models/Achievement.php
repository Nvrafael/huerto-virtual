<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'icon',
        'points_reward',
        'type',
        'conditions',
        'is_active',
    ];

    protected $casts = [
        'conditions' => 'array',
        'is_active' => 'boolean',
        'points_reward' => 'integer',
    ];

    /**
     * Relación con usuarios que han desbloqueado este logro
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_achievements')
                    ->withPivot('unlocked_at')
                    ->withTimestamps();
    }

    /**
     * Verificar si un usuario puede desbloquear este logro
     */
    public function canUnlock(User $user): bool
    {
        if (!$this->is_active) {
            return false;
        }

        // Verificar si ya lo tiene desbloqueado
        if ($this->users()->where('user_id', $user->id)->exists()) {
            return false;
        }

        // Aquí se implementarían las condiciones específicas
        // según el tipo de logro
        return $this->checkConditions($user);
    }

    /**
     * Verificar condiciones específicas del logro
     */
    protected function checkConditions(User $user): bool
    {
        if (!$this->conditions) {
            return true;
        }

        foreach ($this->conditions as $condition => $value) {
            switch ($condition) {
                case 'min_level':
                    if ($user->level < $value) return false;
                    break;
                case 'min_points':
                    if ($user->points < $value) return false;
                    break;
                case 'min_plants':
                    // Aquí se implementaría la lógica para contar plantas
                    // if ($user->plants()->count() < $value) return false;
                    break;
                // Agregar más condiciones según sea necesario
            }
        }

        return true;
    }

    /**
     * Desbloquear logro para un usuario
     */
    public function unlockFor(User $user): void
    {
        if ($this->canUnlock($user)) {
            $this->users()->attach($user->id, ['unlocked_at' => now()]);
            $user->addPoints($this->points_reward);
        }
    }
}
