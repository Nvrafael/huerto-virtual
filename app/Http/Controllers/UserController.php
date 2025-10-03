<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar el perfil del usuario
     */
    public function profile()
    {
        $user = Auth::user();
        $achievements = $user->achievements()->withPivot('unlocked_at')->get();
        $ranking = $this->getUserRanking($user);
        
        return view('users.profile', compact('user', 'achievements', 'ranking'));
    }

    /**
     * Mostrar el ranking general
     */
    public function ranking()
    {
        $users = User::orderBy('points', 'desc')
                    ->orderBy('level', 'desc')
                    ->orderBy('experience', 'desc')
                    ->take(50)
                    ->get();
        
        return view('users.ranking', compact('users'));
    }

    /**
     * Mostrar formulario de edición de perfil
     */
    public function edit()
    {
        return view('users.edit', ['user' => Auth::user()]);
    }

    /**
     * Actualizar perfil del usuario
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'bio' => ['nullable', 'string', 'max:500'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $data = $request->only(['name', 'email', 'bio']);

        // Manejar avatar si se sube
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $avatarPath;
        }

        $user->update($data);

        return redirect()->route('profile')->with('success', 'Perfil actualizado correctamente.');
    }

    /**
     * Mostrar formulario de cambio de contraseña
     */
    public function editPassword()
    {
        return view('users.change-password');
    }

    /**
     * Actualizar contraseña
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile')->with('success', 'Contraseña actualizada correctamente.');
    }

    /**
     * Obtener la posición del usuario en el ranking
     */
    private function getUserRanking(User $user): int
    {
        $usersWithMorePoints = User::where('points', '>', $user->points)->count();
        return $usersWithMorePoints + 1;
    }

    /**
     * Dashboard del usuario
     */
    public function dashboard()
    {
        $user = Auth::user();
        $recentAchievements = $user->achievements()
                                 ->orderBy('user_achievements.unlocked_at', 'desc')
                                 ->take(5)
                                 ->get();
        
        $levelProgress = $user->getLevelProgress();
        
        return view('dashboard', compact('user', 'recentAchievements', 'levelProgress'));
    }
}
