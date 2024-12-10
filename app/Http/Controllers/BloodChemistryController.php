<?php

namespace App\Http\Controllers;

use App\Models\BloodChemistry;
use App\Models\MedicalTechnologist;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BloodChemistryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bloodChemistry = BloodChemistry::query()
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

        return Inertia::render('BloodChemistry/Index', [
            'bloodChemistry' => $bloodChemistry,
            'filters' => request()->only(['first_name', 'middle_name', 'last_name']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicalTechnologists = MedicalTechnologist::all();
        return Inertia::render('BloodChemistry/Create', compact('medicalTechnologists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'enccode' => 'nullable|string',
            'hpercode' => 'nullable|string',
            'date_of_report' => 'nullable|date',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'age' => 'nullable|numeric',
            'sex' => 'required|string',
            'requesting_physician' => 'nullable|string',
            'ward' => 'nullable|string',
            'medical_technologist_id' => 'required|exists:medical_technologists,id',
            'fbs' => 'nullable|string',
            'sgot' => 'nullable|string',
            'sgpt' => 'nullable|string',
            'creatinine' => 'nullable|string',
            'bun_urea' => 'nullable|string',
            'uric_acid' => 'nullable|string',
            'total_bilirubin' => 'nullable|string',
            'direct_bilirubin' => 'nullable|string',
            'indirect_bilirubin' => 'nullable|string',
            'total_protein' => 'nullable|string',
            'albumin' => 'nullable|string',
            'globulin' => 'nullable|string',
            'ag_ratio' => 'nullable|string',
            'cholesterol' => 'nullable|string',
            'triglyceride' => 'nullable|string',
            'hdl_cholesterol' => 'nullable|string',
            'ldl_cholesterol' => 'nullable|string',
            'vldl_cholesterol' => 'nullable|string',
            'hba1c' => 'nullable|string',
            'sodium' => 'nullable|string',
            'potassium' => 'nullable|string',
            'chloride' => 'nullable|string',
            'ionized_calcium' => 'nullable|string',
            'nonionized_calcium' => 'nullable|string',
            'total_calcium' => 'nullable|string',
        ]);

        $bloodChemistry = BloodChemistry::create($request->all());

        return redirect()->route('blood-chemistries.index')->with('success', 'Blood Chemistry record created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(BloodChemistry $bloodChemistry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BloodChemistry $bloodChemistry)
    {
        $medicalTechnologists = MedicalTechnologist::all();
        return Inertia::render('BloodChemistry/Edit', compact('bloodChemistry', 'medicalTechnologists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BloodChemistry $bloodChemistry)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'sex' => 'required|in:male,female',
            'ward' => 'nullable|string|max:255',
            'requesting_physician' => 'nullable|string|max:255',
            'specimen' => 'nullable|string|max:255',
            'specimen_no' => 'nullable|string|max:255',
            'case_no' => 'nullable|string|max:255',
            'date_collected' => 'nullable|date',
            'date_received' => 'nullable|date',
            'date_reported' => 'nullable|date',
            'fbs' => 'nullable|string',
            'rbs' => 'nullable|string',
            'bun' => 'nullable|string',
            'creatinine' => 'nullable|string',
            'uric_acid' => 'nullable|string',
            'sgpt' => 'nullable|string',
            'sgot' => 'nullable|string',
            'alkaline_phosphatase' => 'nullable|string',
            'total_bilirubin' => 'nullable|string',
            'direct_bilirubin' => 'nullable|string',
            'indirect_bilirubin' => 'nullable|string',
            'total_protein' => 'nullable|string',
            'albumin' => 'nullable|string',
            'globulin' => 'nullable|string',
            'ag_ratio' => 'nullable|string',
            'cholesterol' => 'nullable|string',
            'triglyceride' => 'nullable|string',
            'hdl_cholesterol' => 'nullable|string',
            'ldl_cholesterol' => 'nullable|string',
            'vldl_cholesterol' => 'nullable|string',
            'hba1c' => 'nullable|string',
            'sodium' => 'nullable|string',
            'potassium' => 'nullable|string',
            'chloride' => 'nullable|string',
            'ionized_calcium' => 'nullable|string',
            'nonionized_calcium' => 'nullable|string',
            'total_calcium' => 'nullable|string',
            'medical_technologist_id' => 'required|exists:medical_technologists,id',
        ]);

        $bloodChemistry->update($request->all());

        return redirect()->route('blood-chemistries.index')->with('success', 'Blood Chemistry record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BloodChemistry $bloodChemistry)
    {
        //
    }
}
