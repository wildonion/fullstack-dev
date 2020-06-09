<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BodySetting extends Model
{
    protected $table = 'body_setting';
    protected $fillable = ['title', 'titleF_User', 'picture', 'status','description'
    						, 'descriptionF_User'];
}
