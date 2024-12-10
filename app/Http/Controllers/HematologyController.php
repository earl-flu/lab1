<?php

namespace App\Http\Controllers;

use App\Models\Hematology;
use App\Models\MedicalTechnologist;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HematologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hematologies = Hematology::query()
            ->when(request('first_name'), function ($query, $firstName) {
                $query->where('first_name', 'like', "%{$firstName}%");
            })
            ->when(request('middle_name'), function ($query, $middleName) {
                $query->where('middle_name', 'like', "%{$middleName}%");
            })
            ->when(request('last_name'), function ($query, $lastName) {
                $query->where('last_name', 'like', "%{$lastName}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Hematology/Index', [
            'hematologies' => $hematologies,
            'filters' => request()->only(['first_name', 'middle_name', 'last_name']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicalTechnologists = MedicalTechnologist::where('is_active', true)
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        return Inertia::render('Hematology/Create', [
            'medicalTechnologists' => $medicalTechnologists,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date_of_report' => 'required|date',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'age' => 'nullable|string|max:10',
            'sex' => 'required|string|in:Male,Female',
            'cs' => 'nullable|string|max:255',
            'requesting_physician' => 'nullable|string|max:255',
            'clinical_diagnosis' => 'nullable|string|max:255',
            'ward' => 'nullable|string|max:255',
            'bed_no' => 'nullable|string|max:50',
            'medical_technologist_id' => 'required|exists:medical_technologists,id',
            'hematocrit_m' => 'nullable|string|max:50',
            'hematocrit_f' => 'nullable|string|max:50',
            'hemoglobin_m' => 'nullable|string|max:50',
            'hemoglobin_f' => 'nullable|string|max:50',
            'rbc_count' => 'nullable|string|max:50',
            'wbc_count' => 'nullable|string|max:50',
            'differential_count' => 'nullable|string|max:50',
            'neutrophils' => 'nullable|string|max:50',
            'segmenters' => 'nullable|string|max:50',
            'stabs' => 'nullable|string|max:50',
            'juveniles' => 'nullable|string|max:50',
            'myclocytes' => 'nullable|string|max:50',
            'lymphocytes' => 'nullable|string|max:50',
            'monocytes' => 'nullable|string|max:50',
            'eusinophils' => 'nullable|string|max:50',
            'basophils' => 'nullable|string|max:50',
            'esr_m' => 'nullable|string|max:50',
            'esr_f' => 'nullable|string|max:50',
            'platelet_count' => 'nullable|string|max:50',
            'bleeding_time' => 'nullable|string',
            'clotting_time' => 'nullable|string',
            'crt' => 'nullable|string',
            'mcv' => 'nullable|string|max:50',
            'mch' => 'nullable|string|max:50',
            'mchc' => 'nullable|string|max:50',
            'blood_type' => 'nullable|string|max:255',
            'others' => 'nullable|string',
        ]);
        // Set female-specific fields to null if sex is Male
        if ($validatedData['sex'] === 'Male') {
            $validatedData['hematocrit_f'] = null;
            $validatedData['hemoglobin_f'] = null;
            $validatedData['esr_f'] = null;
        }

        // Set male-specific fields to null if sex is Female
        if ($validatedData['sex'] === 'Female') {
            $validatedData['hematocrit_m'] = null;
            $validatedData['hemoglobin_m'] = null;
            $validatedData['esr_m'] = null;
        }

        Hematology::create($validatedData);

        return redirect()->route('hematologies.index')->with('success', 'Hematology record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hematology $hematology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hematology $hematology)
    {
        $medicalTechnologists = MedicalTechnologist::where('is_active', true)
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        return Inertia::render('Hematology/Edit', [
            'hematology' => $hematology,
            'medicalTechnologists' => $medicalTechnologists,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hematology $hematology)
    {
        $validatedData = $request->validate([
            'date_of_report' => 'required|date',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'age' => 'required|integer|min:0',
            'sex' => 'required|string|max:10',
            'cs' => 'nullable|string|max:50',
            'requesting_physician' => 'nullable|string|max:255',
            'clinical_diagnosis' => 'nullable|string|max:255',
            'ward' => 'nullable|string|max:50',
            'bed_no' => 'nullable|string|max:50',
            'medical_technologist_id' => 'required|exists:medical_technologists,id',
            'hematocrit_m' => 'nullable|string|max:50',
            'hematocrit_f' => 'nullable|string|max:50',
            'hemoglobin_m' => 'nullable|string|max:50',
            'hemoglobin_f' => 'nullable|string|max:50',
            'rbc_count' => 'nullable|string|max:50',
            'wbc_count' => 'nullable|string|max:50',
            'differential_count' => 'nullable|string|max:50',
            'neutrophils' => 'nullable|string|max:50',
            'segmenters' => 'nullable|string|max:50',
            'stabs' => 'nullable|string|max:50',
            'juveniles' => 'nullable|string|max:50',
            'myclocytes' => 'nullable|string|max:50',
            'lymphocytes' => 'nullable|string|max:50',
            'monocytes' => 'nullable|string|max:50',
            'eusinophils' => 'nullable|string|max:50',
            'basophils' => 'nullable|string|max:50',
            'esr_m' => 'nullable|string|max:50',
            'esr_f' => 'nullable|string|max:50',
            'platelet_count' => 'nullable|string|max:50',
            'bleeding_time' => 'nullable|string|max:50',
            'clotting_time' => 'nullable|string|max:50',
            'crt' => 'nullable|string|max:50',
            'mcv' => 'nullable|string|max:50',
            'mch' => 'nullable|string|max:50',
            'mchc' => 'nullable|string|max:50',
            'blood_type' => 'nullable|string|max:10',
            'others' => 'nullable|string',
        ]);

        // Set female-specific fields to null if sex is Male
        if ($validatedData['sex'] === 'Male') {
            $validatedData['hematocrit_f'] = null;
            $validatedData['hemoglobin_f'] = null;
            $validatedData['esr_f'] = null;
        }

        // Set male-specific fields to null if sex is Female
        if ($validatedData['sex'] === 'Female') {
            $validatedData['hematocrit_m'] = null;
            $validatedData['hemoglobin_m'] = null;
            $validatedData['esr_m'] = null;
        }

        $hematology->update($validatedData);

        return redirect()->route('hematologies.index')->with('success', 'Hematology record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hematology $hematology)
    {
        //
    }
}
