<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insured extends Model
{
    protected $table = 'insured';
    protected $fillable = ['title', 'off_percentage'];
}
