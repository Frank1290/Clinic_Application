<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = ['patient_id', 'blood_pressure', 'sugar', 'weight', 'disease_name', 'symptoms', 'checkup_date', 'patient_status'];
}
