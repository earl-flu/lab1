<?php

namespace App\Http\Controllers;

use App\Models\BloodChemistry;
use App\Models\Hematology;
use App\Models\Setting;
use App\Models\StoolExamination;
use App\Models\Urine;
use Illuminate\Http\Request;

class PrintFormController extends Controller
{
    public function hematologyForm(Hematology $hematology)
    {
        $setting = Setting::find(1) ?? null;
        return view('print.hematology', compact('hematology', 'setting'));
    }

    public function urineForm(Urine $urine)
    {
        $setting = Setting::find(1) ?? null;
        return view('print.urine', compact('urine', 'setting'));
    }

    public function bloodChemistryForm(BloodChemistry $bloodChemistry)
    {
        $setting = Setting::find(1) ?? null;
        return view('print.blood-chemistry', compact('bloodChemistry', 'setting'));
    }

    public function stoolExaminationResult(StoolExamination $stoolExamination)
    {
        $setting = Setting::find(1) ?? null;
        return view('print.stool-examination-result', compact('stoolExamination', 'setting'));
    }
}
