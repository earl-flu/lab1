<?php

namespace App\Http\Controllers;

use App\Models\MedicalTechnologist;
use Illuminate\Http\Request;

class MedicalTechnologistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologists = MedicalTechnologist::all();
        return response()->json($technologists);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        return response()->json($technologist, 201);
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
        //
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
        return response()->json($medicalTechnologist);
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
