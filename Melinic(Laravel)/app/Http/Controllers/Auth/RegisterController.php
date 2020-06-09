<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'clerk_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'age' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

         $fileName = 'null';
        if (Input::file('clerk_picture')->isValid()) {
            $destinationPath = base_path() . '/public/uploads/images/';
            $extension = Input::file('clerk_picture')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;

            Input::file('clerk_picture')->move($destinationPath, $fileName);
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'url_token' => str_random(6),
            'address_url_token' => str_random(6),
            'age' => $data['age'],
            'clerk_picture' => $fileName,
            'password' => bcrypt($data['password']),
        ]);
    }
}
