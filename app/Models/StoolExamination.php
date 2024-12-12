<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoolExamination extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function medicalTechnologist()
    {
        return $this->belongsTo(MedicalTechnologist::class);
    }
}