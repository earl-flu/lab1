<?php

namespace App\Http\Controllers;

use App\Models\MedicalTechnologist;
use App\Models\StoolExamination;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StoolExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stoolExaminations = StoolExamination::query()
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

        return Inertia::render('StoolExamination/Index', [
            'stoolExaminations' => $stoolExaminations,
            'filters' => request()->only(['first_name', 'middle_name', 'last_name']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicalTechnologists = MedicalTechnologist::all();
        return Inertia::render('StoolExamination/Create', compact('medicalTechnologists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date_of_report' => 'nullable|date',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'age' => 'nullable|string|max:255',
            'sex' => 'required|string|max:10',
            'requesting_physician' => 'nullable|string|max:255',
            'ward' => 'nullable|string|max:255',
            'medical_technologist_id' => 'required|exists:medical_technologists,id', // Assuming users table
            'color' => 'nullable|string|max:255',
            'consistency' => 'nullable|string|max:255',
            'occult_blood' => 'nullable|string|max:255',
            'red_cells' => 'nullable|string|max:255',
            'pus_cells' => 'nullable|string|max:255',
            'macrophages' => 'nullable|string|max:255',
            'trichuris_ova' => 'nullable|string|max:255',
            'ascaris_ova' => 'nullable|string|max:255',
            'hookworm' => 'nullable|string|max:255',
            't_hominis' => 'nullable|string|max:255',
            'g_lambia_a_cyst' => 'nullable|string|max:255',
            'b_trophozoite' => 'nullable|string|max:255',
            'e_histolyca_a_cyst' => 'nullable|string|max:255',
            'bacteria' => 'nullable|string|max:255',
            'others' => 'nullable|string',
        ]);

        StoolExamination::create($validatedData);

        return redirect()->route('stool-examinations.index')->with('success', 'Urine created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(StoolExamination $stoolExamination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StoolExamination $stoolExamination)
    {
        $medicalTechnologists = MedicalTechnologist::all();
        return Inertia::render('StoolExamination/Edit', compact('medicalTechnologists', 'stoolExamination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StoolExamination $stoolExamination)
    {
        $validatedData = $request->validate([
            'date_of_report' => 'nullable|date',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'age' => 'nullable|string|max:255',
            'sex' => 'required|string|max:10',
            'requesting_physician' => 'nullable|string|max:255',
            'ward' => 'nullable|string|max:255',
            'medical_technologist_id' => 'required|exists:medical_technologists,id', // Assuming users table
            'color' => 'nullable|string|max:255',
            'consistency' => 'nullable|string|max:255',
            'occult_blood' => 'nullable|string|max:255',
            'red_cells' => 'nullable|string|max:255',
            'pus_cells' => 'nullable|string|max:255',
            'macrophages' => 'nullable|string|max:255',
            'trichuris_ova' => 'nullable|string|max:255',
            'ascaris_ova' => 'nullable|string|max:255',
            'hookworm' => 'nullable|string|max:255',
            't_hominis' => 'nullable|string|max:255',
            'g_lambia_a_cyst' => 'nullable|string|max:255',
            'b_trophozoite' => 'nullable|string|max:255',
            'e_histolyca_a_cyst' => 'nullable|string|max:255',
            'bacteria' => 'nullable|string|max:255',
            'others' => 'nullable|string',
        ]);

        $stoolExamination->update($validatedData);

        return redirect()->route('stool-examinations.index')->with('success', 'Urine created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StoolExamination $stoolExamination)
    {
        //
    }
}
