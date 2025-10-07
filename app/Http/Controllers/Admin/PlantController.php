<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plants = Plant::latest()->paginate(10);
        return view('admin.plants.index', compact('plants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.plants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'growth_time' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('plants', 'public');
        }

        // Compatibilidad con esquemas existentes: growth_time_days
        $hasGrowthTime = Schema::hasColumn('plants', 'growth_time');
        $hasGrowthTimeDays = Schema::hasColumn('plants', 'growth_time_days');
        if ($hasGrowthTimeDays && !$hasGrowthTime) {
            $validated['growth_time_days'] = $validated['growth_time'];
            unset($validated['growth_time']);
        }

        Plant::create($validated);

        return redirect()->route('admin.plants.index')->with('success', 'Planta creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plant $plant)
    {
        return view('admin.plants.show', compact('plant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plant $plant)
    {
        return view('admin.plants.edit', compact('plant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plant $plant)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'growth_time' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            // eliminar imagen anterior si existe
            if ($plant->image) {
                Storage::disk('public')->delete($plant->image);
            }
            $validated['image'] = $request->file('image')->store('plants', 'public');
        }

        // Compatibilidad con esquemas existentes: growth_time_days
        $hasGrowthTime = Schema::hasColumn('plants', 'growth_time');
        $hasGrowthTimeDays = Schema::hasColumn('plants', 'growth_time_days');
        if ($hasGrowthTimeDays && !$hasGrowthTime) {
            $validated['growth_time_days'] = $validated['growth_time'];
            unset($validated['growth_time']);
        }

        $plant->update($validated);

        return redirect()->route('admin.plants.index')->with('success', 'Planta actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $plant)
    {
        if ($plant->image) {
            Storage::disk('public')->delete($plant->image);
        }

        $plant->delete();

        return redirect()->route('admin.plants.index')->with('success', 'Planta eliminada correctamente.');
    }
}
