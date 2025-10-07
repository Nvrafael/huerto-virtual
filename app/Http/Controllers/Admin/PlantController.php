<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlantController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:administrador']);
    }

    public function index()
    {
        $plants = Plant::orderBy('created_at', 'desc')->paginate(12);
        return view('admin.plants.index', compact('plants'));
    }

    public function create()
    {
        return view('admin.plants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'growth_time_days' => ['required', 'integer', 'min:1', 'max:3650'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('plants', 'public');
        }

        Plant::create([
            'name' => $validated['name'],
            'growth_time_days' => $validated['growth_time_days'],
            'description' => $validated['description'] ?? null,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.plants.index')->with('success', 'Planta creada correctamente.');
    }

    public function show(Plant $plant)
    {
        return view('admin.plants.show', compact('plant'));
    }

    public function edit(Plant $plant)
    {
        return view('admin.plants.edit', compact('plant'));
    }

    public function update(Request $request, Plant $plant)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'growth_time_days' => ['required', 'integer', 'min:1', 'max:3650'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ]);

        $data = [
            'name' => $validated['name'],
            'growth_time_days' => $validated['growth_time_days'],
            'description' => $validated['description'] ?? null,
        ];

        if ($request->hasFile('image')) {
            if ($plant->image_path) {
                Storage::disk('public')->delete($plant->image_path);
            }
            $data['image_path'] = $request->file('image')->store('plants', 'public');
        }

        $plant->update($data);

        return redirect()->route('admin.plants.index')->with('success', 'Planta actualizada correctamente.');
    }

    public function destroy(Plant $plant)
    {
        if ($plant->image_path) {
            Storage::disk('public')->delete($plant->image_path);
        }
        $plant->delete();

        return redirect()->route('admin.plants.index')->with('success', 'Planta eliminada correctamente.');
    }
}
