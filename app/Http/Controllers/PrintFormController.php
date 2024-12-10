<?php

namespace App\Http\Controllers;

use App\Models\BloodChemistry;
use App\Models\Hematology;
use App\Models\Urine;
use Illuminate\Http\Request;

class PrintFormController extends Controller
{
    public function hematologyForm(Hematology $hematology)
    {
        // dd($hematology);
        return view('print.hematology', compact('hematology'));
    }

    public function urineForm(Urine $urine)
    {
        return view('print.urine', compact('urine'));
    }

    public function bloodChemistryForm(BloodChemistry $bloodChemistry)
    {
        return view('print.blood-chemistry', compact('bloodChemistry'));
    }   
}


