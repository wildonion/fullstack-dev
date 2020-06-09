<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EOC extends Model
{
    protected $table = 'earn_of_clinic';
    protected $fillable = ['total_earn',];
}
