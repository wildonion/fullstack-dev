<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PVP extends Model
{
    protected $table = 'patient_visit_paper';
    protected $fillable = ['patient_id', 'doctor_id', 'room', 'total_price',];
}
