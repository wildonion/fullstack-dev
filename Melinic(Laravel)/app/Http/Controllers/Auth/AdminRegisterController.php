<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Admin;
use App\DP;
use Auth;
use Illuminate\Support\Facades\Input;

class AdminRegisterController extends Controller
{
	
	protected $redirectPath = '/admin/login';

	public function __construct()
	{
		// $this->middleware('auth:admin')->except('showRegistrationForm', 'register'); // guest middleware with admin guard
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
            'password' => 'required|min:6|confirmed',
            'price_of_free_visit' => 'required|between:0,99.99',
            'specialties' => 'required|string|max:255',
            'insured_expiration_date' => 'required|date',
            'doc_description' => 'required',
            'room_to_visit' => 'unique:admins',
            'doc_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'password'=>'required|min:6|confirmed'
        ]);
     }

    protected function create(array $data)
    {
          $fileName = 'null';
        if (Input::file('doc_picture')) {
            if(Input::file('doc_picture')->isValid()){
            $destinationPath = base_path() . '/public/uploads/images/';
            $extension = Input::file('doc_picture')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;

            Input::file('doc_picture')->move($destinationPath, $fileName);
          }
       }

        $address_url_token = str_random(6);

           $dp = New DP;
           $dp->address_url_token = $address_url_token;
           $dp->save();

        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'specialties' => $data['specialties'],
            'doc_picture' => $data['doc_picture'],
            'insured_expiration_date' => $data['insured_expiration_date'],
            'doc_description' => $data['doc_description'],
            'price_of_free_visit' => $data['price_of_free_visit'],
            'doc_picture' =>  $fileName,
            'url_token' => str_random(6),
            'address_url_token' => $address_url_token,
            'room_to_visit' => $data['room_to_visit'],
            'password' => bcrypt($data['password']),
        ]);


    }

     protected function guard()
	 {
	    return Auth::guard('admin');
	 }

}
