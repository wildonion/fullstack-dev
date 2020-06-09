<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopSetting extends Model
{
    protected $table = 'shop_setting';
    protected $fillable = ['title','titleF_User', 'picture', 
    							'status','description','descriptionF_User', 'expired_at'];
}
