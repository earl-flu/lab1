<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodChemistry extends Model
{
    use HasFactory;
 
    protected $guarded = ['id'];

    // protected $casts = [
    //     'fbs' => 'decimal:2',
    //     'sgot' => 'decimal:2',
    //     'sgpt' => 'decimal:2',
    //     'creatinine' => 'decimal:2',
    //     'bun_urea' => 'decimal:2',
    //     'uric_acid' => 'decimal:2',
    //     'total_bilirubin' => 'decimal:2',
    //     'direct_bilirubin' => 'decimal:2',
    //     'indirect_bilirubin' => 'decimal:2',
    //     'total_protein' => 'decimal:2',
    //     'albumin' => 'decimal:2',
    //     'globulin' => 'decimal:2',
    //     'ag_ratio' => 'decimal:2',
    //     'cholesterol' => 'decimal:2',
    //     'triglyceride' => 'decimal:2',
    //     'hdl_cholesterol' => 'decimal:2',
    //     'ldl_cholesterol' => 'decimal:2',
    //     'vldl_cholesterol' => 'decimal:2',
    //     'hba1c' => 'decimal:2',
    //     'sodium' => 'decimal:2',
    //     'potassium' => 'decimal:2',
    //     'chloride' => 'decimal:2',
    //     'ionized_calcium' => 'decimal:2',
    //     'nonionized_calcium' => 'decimal:2',
    //     'total_calcium' => 'decimal:2',
    // ];

    public function medicalTechnologist()
    {
        return $this->belongsTo(MedicalTechnologist::class);
    }

    // private function formatDecimal($value)
    // {
    //     // Check if the value is NULL
    //     if ($value === null) {
    //         return ''; // Return an empty string if the value is NULL
    //     }
    
    //     // Check if the value is an integer
    //     if ($value == (int)$value) {
    //         return (string)(int)$value; // Return as integer if it's a whole number
    //     } else {
    //         return rtrim(rtrim(number_format($value, 2, '.', ''), '0'), '.'); // Return formatted value without trailing zeros
    //     }
    // }
    
    // public function getFbsAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }
    // public function getAgRatioAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getTriglycerideAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getSgotAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getSgptAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getCreatinineAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getBunUreaAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getUricAcidAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getTotalBilirubinAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getDirectBilirubinAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getIndirectBilirubinAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getTotalProteinAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getAlbuminAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getGlobulinAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getIonizedCalciumAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getNonionizedCalciumAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getCholesterolAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getHdlCholesterolAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getLdlCholesterolAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getVldlCholesterolAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getHba1cAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getSodiumAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getPotassiumAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getChlorideAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getTotalCalciumAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }
}
