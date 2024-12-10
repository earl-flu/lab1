<?php

namespace App\Http\Controllers;

use App\Models\MedicalTechnologist;
use App\Models\Urine;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UrineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $urines = Urine::query()
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

        return Inertia::render('Urine/Index', [
            'urines' => $urines,
            'filters' => request()->only(['first_name', 'middle_name', 'last_name']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicalTechnologists = MedicalTechnologist::all();
        return Inertia::render('Urine/Create', compact('medicalTechnologists'));
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
            'macro_color' => 'nullable|string',
            'macro_transparency' => 'nullable|string',
            'macro_sp_gravity' => 'nullable|string',
            'macro_reaction_ph' => 'nullable|string',
            'macro_albumin' => 'nullable|string',
            'macro_sugar' => 'nullable|string',
            'micro_epithelial_cells' => 'nullable|string',
            'micro_red_cells' => 'nullable|string',
            'micro_pus_cells' => 'nullable|string',
            'micro_bacteria' => 'nullable|string',
            'micro_casts' => 'nullable|string',
            'others' => 'nullable|string',
            'pt_result' => 'nullable|string',
            'pt_brand_name' => 'nullable|string',
            'pt_lot_no' => 'nullable|string',
            'pt_expiry_date' => 'nullable|date',
            'medical_technologist_id' => 'required|exists:medical_technologists,id',
        ]);

        Urine::create($request->all());

        return redirect()->route('urines.index')->with('success', 'Urine created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Urine $urine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Urine $urine)
    {
        $medicalTechnologists = MedicalTechnologist::all();
        return Inertia::render('Urine/Edit', compact('urine', 'medicalTechnologists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Urine $urine)
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
            'macro_color' => 'nullable|string',
            'macro_transparency' => 'nullable|string',
            'macro_sp_gravity' => 'nullable|string',
            'macro_reaction_ph' => 'nullable|string',
            'macro_albumin' => 'nullable|string',
            'macro_sugar' => 'nullable|string',
            'micro_epithelial_cells' => 'nullable|string',
            'micro_red_cells' => 'nullable|string',
            'micro_pus_cells' => 'nullable|string',
            'micro_bacteria' => 'nullable|string',
            'micro_casts' => 'nullable|string',
            'others' => 'nullable|string',
            'pt_result' => 'nullable|string',
            'pt_brand_name' => 'nullable|string',
            'pt_lot_no' => 'nullable|string',
            'pt_expiry_date' => 'nullable|date',
            'medical_technologist_id' => 'required|exists:medical_technologists,id',
        ]);

        $urine->update($request->all());

        return redirect()->route('urines.index')->with('success', 'Urine updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Urine $urine)
    {
        //
    }
}
