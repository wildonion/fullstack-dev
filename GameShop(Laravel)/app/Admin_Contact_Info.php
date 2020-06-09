<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_Contact_Info extends Model
{
    protected $table = 'admin_contact_info';
    protected $fillable = ['full_name', 'instagram', 'telegram', 
    						'email', 'compony', 'picture', 'about_me', 'about_meF_User', 
    						'phone_number'];
}
