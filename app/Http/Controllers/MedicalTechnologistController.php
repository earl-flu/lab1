<?php

namespace App\Http\Controllers;

use App\Models\MedicalTechnologist;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as FacadesRequest;

class MedicalTechnologistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicalTechnologists = MedicalTechnologist::orderBy('name')
            ->when(FacadesRequest::input('name'), function ($query, $name) {
                $query->where('name', 'like', "%{$name}%");
            })
            ->paginate(5)
            ->withQueryString()
            ->onEachSide(0);

        return Inertia::render('MedicalTechnologist/Index', [
            'medicalTechnologists' => $medicalTechnologists,
            'filters' => FacadesRequest::only('name')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd('test');
        return Inertia::render('MedicalTechnologist/Create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'license_number' => 'required|string|unique:medical_technologists,license_number',
            'is_active' => 'boolean',
        ]);

        $technologist = MedicalTechnologist::create($validated);
        return redirect()->route('medical-technologists.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalTechnologist $medicalTechnologist)
    {
        return response()->json($medicalTechnologist);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalTechnologist $medicalTechnologist)
    {
        return Inertia::render(
            'MedicalTechnologist/Edit',
            [
                'medicalTechnologist' => $medicalTechnologist
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicalTechnologist $medicalTechnologist)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'license_number' => 'string|unique:medical_technologists,license_number,' . $medicalTechnologist->id,
            'is_active' => 'boolean',
        ]);

        $medicalTechnologist->update($validated);
        return redirect()->route('medical-technologists.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalTechnologist $medicalTechnologist)
    {
        $medicalTechnologist->delete();
        return response()->json(null, 204);
    }
}
