<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin'); // auth middleware with admin guard
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    public function showPasswordUpdateForm($name, $url_token)
    {

        $admin = Admin::where('name', $name)->where('url_token', $url_token)->first();

        $data = ['name' => $name, 
                 'email' => $admin->email, 
                 'job_title' => $admin->job_title];

        return view('auth.passwords.update-admin', compact('data'));
    }

    public function UpdatePassword(Request $request)
    {
         $admin = Admin::find(Auth::user()->id);

         $admin->url_token = str_random(6);

         $this->validate($request, [
            'name'=>'required|max:255',
            'email'=>'required|email',
            'job_title' => 'required|string|max:255',
            'password'=>'required|min:6|confirmed'
        ]);

        $input = ['name' => $request['name'], 
                  'email' => $request['email'], 
                  'job_title' => $request['job_title'],
                  'password' => bcrypt($request['password'])];

        $admin->fill($input)->save();

        return redirect()->route('admin.password.update', array($admin->name, $admin->url_token))
                        ->with('alert-success', 'Credentials Updated Successfully');
    }

}
