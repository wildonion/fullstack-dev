<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Input;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Address;
use App\DP;
use App\Prescription;

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

    public function SavePatientPrescription(Request $request){

       $patient_prescription = New Prescription;

         $this->validate($request, [
            'doctor_id'=>'required|numeric',
            'patient_id'=>'required|numeric',
            'prescription' => 'required|max:20000'
        ]);

          $input = ['doctor_id' => $request['doctor_id'], 
                  'patient_id' => $request['patient_id'], 
                  'description' => $request['prescription']
                ];

            $patient_prescription->fill($input)->save();
            return redirect()->route('doc.pastient.now')
                        ->with('alert-success', 'Credentials Patient Prescription Addedd Successfully');

    }

    public function DesPatientSession(Request $request){
      $request->session()->forget('turning_number');
      $request->session()->forget('total_price');
      $request->session()->forget('doctor_specialties');
      $request->session()->forget('room');
      if($request->session()->has('kind_of_insured')){
          $request->session()->forget('kind_of_insured');
      }
      $request->session()->forget('patient_id');
      $request->session()->forget('doctor_id');
      $request->session()->forget('patient_token');

      return redirect()->route('doc.pastient.now')
                        ->with('alert-success', 'Patient Session Deleted Successfully');

    }


    public function ShowNowPatient(){
      return view('auth.admin-see-patient');
    }


    public function showPasswordUpdateForm($name, $url_token)
    {

        $admin = Admin::where('name', $name)->where('url_token', $url_token)->first();
        $doc_p = DP::where('address_url_token', Auth::user()->address_url_token)->first();


        $data = ['name' => $name, 
                 'email' => $admin->email, 
                 'specialties' => $admin->specialties,
                 'price_of_free_visit' => $admin->price_of_free_visit,
                 'doc_description' => $admin->doc_description,
                 'insured_expiration_date' => $admin->insured_expiration_date,
                 'doc_picture' => $admin->doc_picture,
                 'total_earn_till_now' => $admin->total_earn_till_now,
                 'room_to_visit' => $admin->room_to_visit,
                 'presence_now' => $admin->presence_now,
                 'doctor_presence_days' => $doc_p->days,
                 'doctor_presence_from' => $doc_p->from,
                 'doctor_presence_till' => $doc_p->till];

        return view('auth.passwords.update-admin', compact('data'));
    }

    public function showAddressUpdateForm(){

       $addresses = DB::table('addresses')->where('url_token', Auth::user()->address_url_token)->orderBy('id', 'desc')->get();

        return view('auth.passwords.update-admin-address', compact('addresses'));
    }

    public function InsertAddress(Request $request){

      $addresses = New Address;

      $this->validate($request, [
            'phone_number'=>'required|numeric',
            'address'=>'required|max:255',
        ]);

      $admin = Admin::find(Auth::user()->id);
      $admin->url_token = str_random(6);

      $input = ['address' => $request['address'], 
                'phone_number' => $request['phone_number'],
                'url_token' => Auth::user()->address_url_token
                ];

        $addresses->fill($input)->save();
        $admin->save();

        return redirect()->route('admin.address.update', array($admin->name, $admin->url_token))
                        ->with('alert-success', 'Credentials Updated Successfully');

    }

    public function UpdateAddress(Request $request){

      $addresses = Address::find(Auth::use()->address_url_token);

      $this->validate($request, [
            'phone_number'=>'required|numeric',
            'address'=>'required|max:255',
        ]);

      $admin = Admin::find(Auth::user()->id);
      $admin->url_token = str_random(6);

      $input = ['address' => $request['address'], 
                'phone_number' => $request['phone_number'],
                'url_token' => Auth::user()->address_url_token
                ];

        $addresses->fill($input)->save();
        $admin->save();

        return redirect()->route('admin.address.update', array($admin->name, $admin->url_token))
                        ->with('alert-success', 'Credentials Updated Successfully');

    }


    public function UpdatePassword(Request $request)
    {
         $admin = Admin::find(Auth::user()->id);
         $doc_p = DP::where('address_url_token', Auth::user()->address_url_token)->first();

       $fileName = 'null';
        if ($request->hasFile('doc_picture')) {

            $destinationPath = base_path() . '/public/uploads/images/';
            $extension = $request->file('doc_picture')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $request->file('doc_picture')->move($destinationPath, $fileName);
        }

         $admin->url_token = str_random(6);

         $this->validate($request, [
            'name'=>'required|max:255',
            'email'=>'required|email',
            'price_of_free_visit' => 'required|between:0,99.99',
            'specialties' => 'required|string|max:255',
            'insured_expiration_date' => 'required|date',
            'doc_description' => 'required',
            // 'doc_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'password'=>'required|min:6|confirmed',
            'days' => 'required|max:600',
            'from' => 'required',
            'till' => 'required'
        ]);

         $value_to_insert = Input::get('presence_now') == 1 ? true : false;

         if($fileName == 'null'){
                $input = ['name' => $request['name'], 
                          'email' => $request['email'], 
                          'specialties' => $request['specialties'],
                          'doc_picture' => $request['doc_picture'],
                          'insured_expiration_date' => $request['insured_expiration_date'],
                          'doc_description' => $request['doc_description'],
                          'price_of_free_visit' => $request['price_of_free_visit'],
                          'password' => bcrypt($request['password']),
                          'presence_now' => $value_to_insert,
                          'room_to_visit' => $admin->room_to_visit
                        ];
          } else {
                $input = ['name' => $request['name'], 
                          'email' => $request['email'], 
                          'specialties' => $request['specialties'],
                          'doc_picture' => $request['doc_picture'],
                          'insured_expiration_date' => $request['insured_expiration_date'],
                          'doc_description' => $request['doc_description'],
                          'price_of_free_visit' => $request['price_of_free_visit'],
                          'doc_picture' =>  $fileName,
                          'password' => bcrypt($request['password']),
                          'presence_now' => $value_to_insert,
                          'room_to_visit' => $admin->room_to_visit
                        ];
          }


                $input1 = [
                          'days' => $request['days'],
                          'from' => $request['from'],
                          'till' => $request['till']
                        ];

        $admin->fill($input)->save();
        $doc_p->fill($input1)->save();

        return redirect()->route('admin.password.update', array($admin->name, $admin->url_token))
                        ->with('alert-success', 'Credentials Updated Successfully');
    }

}
