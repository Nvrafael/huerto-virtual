<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'points',
        'level',
        'avatar',
        'bio',
        'experience',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'points' => 'integer',
            'level' => 'integer',
            'experience' => 'integer',
        ];
    }

    /**
     * Relación con logros del usuario
     */
    public function achievements()
    {
        return $this->belongsToMany(Achievement::class, 'user_achievements')
                    ->withPivot('unlocked_at')
                    ->withTimestamps();
    }

    /**
     * Agregar puntos al usuario
     */
    public function addPoints(int $points): void
    {
        $this->increment('points', $points);
        $this->increment('experience', $points);
        $this->checkLevelUp();
    }

    /**
     * Verificar si el usuario puede subir de nivel
     */
    public function checkLevelUp(): void
    {
        $requiredExperience = $this->level * 100; // 100 puntos por nivel
        
        if ($this->experience >= $requiredExperience) {
            $this->increment('level');
        }
    }

    /**
     * Obtener el progreso hacia el siguiente nivel
     */
    public function getLevelProgress(): int
    {
        $currentLevelExp = ($this->level - 1) * 100;
        $nextLevelExp = $this->level * 100;
        $progress = $this->experience - $currentLevelExp;
        $total = $nextLevelExp - $currentLevelExp;
        
        return $total > 0 ? round(($progress / $total) * 100) : 100;
    }
}
