<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMedicineDetail extends Model
{
    use HasFactory;
    protected $fillable = ['patient_id', 'prescription_id', 'medicine_name', 'quantity', 'when_to_take', 'before_after', 'days'];
}
