<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $table = 'footer_setting';
    protected $fillable = ['description', 'descriptionF_User'];
}
