<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hematology extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // protected $casts = [
    //     'segmenters' => 'string',
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

    // public function getHematocritMAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getHematocritFAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getHemoglobinMAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getHemoglobinFAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getRbcCountAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getWbcCountAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getDifferentialCountAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getNeutrophilsAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getSegmentersAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getStabsAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getJuvenilesAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getMyclocytesAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getLymphocytesAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getMonocytesAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getEusinophilsAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getBasophilsAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getEsrMAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getEsrFAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getPlateletCountAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getMcvAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getMchAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }

    // public function getMchcAttribute($value)
    // {
    //     return $this->formatDecimal($value);
    // }
}
