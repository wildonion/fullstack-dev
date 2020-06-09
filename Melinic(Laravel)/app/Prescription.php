<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescription';
    protected $fillable = ['patient_id', 'doctor_id', 'description',];
}
