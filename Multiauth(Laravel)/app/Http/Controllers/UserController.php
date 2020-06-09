<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:web'); // auth middleware with admin guard
    }

    public function showPasswordUpdateForm($name, $url_token)
    {

        $user = User::where('name', $name)->where('url_token', $url_token)->first();

        $data = ['name' => $name, 
                 'email' => $user->email];

        return view('auth.passwords.update', compact('data'));
    }

    public function UpdatePassword(Request $request)
    {

         $user = User::find(Auth::user()->id);

         $user->url_token = str_random(6);

         $this->validate($request, [
            'name'=>'required|max:255',
            'email'=>'required|email',
            'password'=>'required|min:6|confirmed'
        ]);

        $input = ['name' => $request['name'], 
                  'email' => $request['email'], 
                  'password' => bcrypt($request['password'])];

        $user->fill($input)->save();

        return redirect()->route('user.password.update', array($user->name, $user->url_token))
                        ->with('alert-success', 'Credentials Updated Successfully');
    }
}
