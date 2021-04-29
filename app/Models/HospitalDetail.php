<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'hospital_name', 'hospital_logo', 'dr_name', 'qualification', 'address_1', 'address_2', 'contact_1',
        'contact_2', 'timing_1', 'timing_2', 'email', 'regd_no',
    ];
}
