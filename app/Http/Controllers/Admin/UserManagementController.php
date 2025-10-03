<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:administrador']);
    }

    /**
     * Mostrar lista de usuarios
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Filtros
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('role')) {
            $query->role($request->role);
        }

        $users = $query->with('roles')
                      ->orderBy('created_at', 'desc')
                      ->paginate(15);

        $roles = Role::all();

        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Mostrar formulario de creación de usuario
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Crear nuevo usuario
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'exists:roles,name'],
            'bio' => ['nullable', 'string', 'max:500'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'bio' => $request->bio,
            'points' => 0,
            'level' => 1,
            'experience' => 0,
        ]);

        $user->assignRole($request->role);

        return redirect()->route('admin.users.index')
                        ->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Mostrar usuario específico
     */
    public function show(User $user)
    {
        $user->load('roles', 'achievements');
        return view('admin.users.show', compact('user'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Actualizar usuario
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role' => ['required', 'exists:roles,name'],
            'bio' => ['nullable', 'string', 'max:500'],
            'points' => ['nullable', 'integer', 'min:0'],
            'level' => ['nullable', 'integer', 'min:1'],
            'experience' => ['nullable', 'integer', 'min:0'],
        ]);

        $user->update($request->only(['name', 'email', 'bio', 'points', 'level', 'experience']));

        // Actualizar rol
        $user->syncRoles([$request->role]);

        return redirect()->route('admin.users.index')
                        ->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Eliminar usuario
     */
    public function destroy(User $user)
    {
        // No permitir eliminar al usuario actual
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')
                           ->with('error', 'No puedes eliminar tu propia cuenta.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
                        ->with('success', 'Usuario eliminado exitosamente.');
    }

    /**
     * Resetear puntos de usuario
     */
    public function resetPoints(User $user)
    {
        $user->update([
            'points' => 0,
            'experience' => 0,
            'level' => 1,
        ]);

        return redirect()->route('admin.users.show', $user)
                        ->with('success', 'Puntos del usuario reseteados.');
    }

    /**
     * Agregar puntos a usuario
     */
    public function addPoints(Request $request, User $user)
    {
        $request->validate([
            'points' => ['required', 'integer', 'min:1', 'max:1000'],
        ]);

        $user->addPoints($request->points);

        return redirect()->route('admin.users.show', $user)
                        ->with('success', "Se agregaron {$request->points} puntos al usuario.");
    }
}
