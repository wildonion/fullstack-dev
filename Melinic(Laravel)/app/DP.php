<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DP extends Model
{
    protected $table = 'doctor_presence';
    protected $fillable = ['address_url_token', 'days', 'from', 'till'];
}
