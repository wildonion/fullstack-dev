<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Admin;
use Auth;

class AdminRegisterController extends Controller
{
	
	protected $redirectPath = '/admin/login';

	public function __construct()
	{
		$this->middleware('auth:admin'); // guest middleware with admin guard
	}

	 // we have to override these below functions 
	 // with the original one in Foundation/Auth/RegisterUsers.php
     
     public function showRegistrationForm()
     {
         return view('auth.admin-register');
     }

     // how to override this func?????
     public function register(Request $request)
     {
     	
        $this->validator($request->all())->validate();

        $admin = $this->create($request->all());
        
        $this->guard()->login($admin);

        return redirect($this->redirectPath);
     }

     protected function validator(array $data)
     {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'job_title' => 'required|string|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
     }

    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'job_title' => $data['job_title'],
            'url_token' => str_random(6),
            'password' => bcrypt($data['password']),
        ]);
    }

     protected function guard()
	 {
	    return Auth::guard('admin');
	 }

}
