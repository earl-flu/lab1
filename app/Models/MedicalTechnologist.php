<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalTechnologist extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'license_number', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
