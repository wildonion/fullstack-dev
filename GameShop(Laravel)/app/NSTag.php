<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NSTag extends Model
{
    protected $table = 'nstag_setting';
    protected $fillable = ['tags', 'tagsF_User'];
}
