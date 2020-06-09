<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'general_patients_info';
    protected $fillable = ['name', 'address', 'issued', 'phone_number', 
    'age', 'sex', 'disease_experience', 'insured', 'insured_expiration_date', 'doc_token', 'kind_of_insured'];
}
