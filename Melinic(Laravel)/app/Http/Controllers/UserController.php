<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Address;
use App\Patient;
use App\Admin;
use App\Insured;
use App\PVP;
use App\EOC;
use App\Prescription;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:web'); // auth middleware with web guard
    }

    public function ShowPatientHistory(){
      // fetch data from prescription table

      $all_patient_history = DB::table('prescription')->orderBy('id', 'desc')->get();
      return view('clerkDo.patient-history', compact('all_patient_history'));
    }


    public function ShowSearchPatientForm(){

      $patient_infos = DB::table('general_patients_info')->orderBy('id', 'desc')->get();
      return view('clerkDo.patientsearch', compact('patient_infos'));
    }

    public function SearchPatientResult(Request $request){

        $result_patient_infos = DB::table('general_patients_info')->where('name', 'LIKE', '%'.$request->search.'%')
                ->orWhere('id','LIKE','%'.$request->search.'%')->orWhere('doc_token','LIKE','%'.$request->search.'%')->get();

        return view('clerkDo.patientsearchresult', compact('result_patient_infos'));
    }


    public function ShowRegisterPatientForm(){
      return view('clerkDo.patientregister');
    }

    public function RegisterPatient(Request $request){

      $patient = New Patient;

      $this->validate($request, [
            'name'=>'required|max:255',
            'address'=>'required|max:255',
            'issued' => 'required|max:100',
            'phone_number'=>'required|numeric',
            'age' => 'required',
            'insured_expiration_date' => 'required|date',
            'kind_of_insured' => 'required|max:255'
        ]);      

      $sex_value = Input::get('sex') == 1 ? 'male' : 'female';
      $disease_experience_value = Input::get('disease_experience') == 1 ? true : false;
      $insured_value = Input::get('insured') == 1 ? true : false;

       $input = ['name' => $request['name'], 
                'address' => $request['address'],
                'issued' => $request['issued'],
                'phone_number' => $request['phone_number'],
                'sex' => $sex_value,
                'age' => $request['age'],
                'doc_token' => str_random(6),
                'disease_experience' => $disease_experience_value,
                'insured' => $insured_value,
                'kind_of_insured' => $request['kind_of_insured'],
                'insured_expiration_date' => $request['insured_expiration_date']
                ];

        $patient->fill($input)->save();

        return redirect()->route('main')->with('alert-success', 'New Patient Added Successfully');

    }

    public function ShowDoctorPresenceTable(){

    $doctor_presence = DB::select("
       select admins.id, admins.name, admins.specialties, admins.doc_picture as doc_pic, doctor_presence.days, 
       doctor_presence.from, doctor_presence.till from doctor_presence, admins 
       where doctor_presence.address_url_token = admins.address_url_token
       ");

      return view('clerkDo.doctor-presence', compact('doctor_presence'));
    }

    public function ShowDoctorInfoForm(){

       $p_doctos = DB::table('admins')->where('presence_now', true)->orderBy('id', 'desc')->get();
       $doctors_to_remove = DB::table('admins')->orderBy('id', 'desc')->get();

      return view('clerkDo.doctorinfo', compact('p_doctos', 'doctors_to_remove'));
    }

    public function DelDoctorInfo($id){

      $doc = User::findOrFail($id);

      if($doc->doc_picture != ''){
            unlink(base_path().'/public/uploads/images/'.$doc->doc_picture);
        }

       $doc = Admin::where('id', $id)->delete();
       return redirect()->route('main')->with('alert-danger', 'A Doctor Deleted Successfully');

    }
   
    public function ShowSetupVisitPatientForm(){

      $doctors = DB::table('admins')->where('presence_now', true)->orderBy('id', 'desc')->get();
      $patients = DB::table('general_patients_info')->orderBy('id', 'desc')->get();
      
      return view('clerkDo.setupvisitpaper', compact('doctors', 'patients'));
    
    }

    public function InsertVisitPatient(Request $request){

      // we will print the session data to a paper and give it to patient
      // this table will truncate at the end of the day

      $eoc = New EOC;
      $vp = New PVP;

      $doctor = Admin::find($request['doctor_id']);
      $patient = Patient::find($request['patient_id']);

      $this->validate($request, [
            'doctor_id'=>'required|numeric',
            'patient_id'=>'required|numeric',
            'room' => 'required|numeric',
            'total_price' => 'required|between:0,99.99'
        ]);


      if($patient->insured == true){
           $insured = DB::table('insured')->where('title', $patient->kind_of_insured)->first();
           $total_price = $request['total_price'] * ($insured->off_percentage * 0.01);
           $doctor->total_earn_till_now = $total_price;
           $eoc->total_earn = $total_price;
           $doctor->save();

           $input = ['doctor_id' => $request['doctor_id'], 
                'patient_id' => $request['patient_id'],
                'room' => $request['room'],
                'total_price' => $total_price
                ];

            $vp->fill($input)->save();
            $eoc->save();

            session(['turning_number' => PVP::orderBy('created_at', 'desc')->first()->id,
                    'total_price' => $total_price,
                    'doctor_specialties' => $doctor->specialties,
                    'room' => $request['room'],
                    'kind_of_insured' => $patient->kind_of_insured,
                    'patient_id' => $patient->id,
                    'doctor_id' => $doctor->id,
                    'patient_token' => $patient->doc_token]);

      } else{
            $input = ['doctor_id' => $request['doctor_id'], 
                    'patient_id' => $request['patient_id'],
                    'room' => $request['room'],
                    'total_price' => $request['total_price']
                ];

                $doctor->total_earn_till_now = $request['total_price'];
                $vp->fill($input)->save();
                $eoc->total_earn = $request['total_price'];
                $doctor->save();
                
                session(['turning_number' => PVP::orderBy('created_at', 'desc')->first()->id,
                         'total_price' => $request['total_price'],
                         'doctor_specialties' => $doctor->specialties,
                         'room' => $request['room'],
                         'patient_id' => $patient->id,
                         'doctor_id' => $doctor->id,
                         'patient_token' => $patient->doc_token
                  ]);


      }
        return redirect()->route('main')->with('alert-success', 'New Visit Added Successfully');

    }

    public function ShowInsuredInfoForm(){
      
      $insureds = DB::table('insured')->orderBy('id', 'desc')->get();
      $eoc = DB::table('earn_of_clinic')->first();

      return view('clerkDo.insuredinfo', compact('insureds', 'eoc'));
    }

    public function SubmitInsuredInfo(Request $request){

        $insured = New Insured;

      $this->validate($request, [
            'title'=>'required|max:255',
            'off_percentage'=>'required|numeric'
        ]); 

      $input = ['title' => $request['title'], 
                'off_percentage' => $request['off_percentage']
                ];

        $insured->fill($input)->save();

        return redirect()->route('main')
                        ->with('alert-success', 'New Insured Added Successfully');
    }

    public function showAddressUpdateForm(){

       $addresses = DB::table('addresses')->where('url_token', Auth::user()->address_url_token)->orderBy('id', 'desc')->get();

       return view('clerkDo.clerk-address-setting', compact('addresses'));
    }


    public function showPasswordUpdateForm($name, $url_token)
    {

        $user = User::where('name', $name)->where('url_token', $url_token)->first();

        $data = ['name' => $name, 
                 'email' => $user->email,
                 'age' => $user->age,
                 'clerk_picture' => $user->clerk_picture
                ];

        return view('auth.passwords.update', compact('data'));
    }

    public function InsertAddress(Request $request){

      $addresses = New Address;

      $this->validate($request, [
            'phone_number'=>'required|numeric',
            'address'=>'required|max:255',
        ]);

      $user = User::find(Auth::user()->id);
      $user->url_token = str_random(6);

      $input = ['address' => $request['address'], 
                'phone_number' => $request['phone_number'],
                'url_token' => Auth::user()->address_url_token
                ];

        $addresses->fill($input)->save();
        $user->save();

        return redirect()->route('user.address.update', array($user->name, $user->url_token))
                        ->with('alert-success', 'Credentials Updated Successfully');

    }

    public function UpdateAddress(Request $request){

      $addresses = Address::find(Auth::user()->address_url_token);

      $this->validate($request, [
            'phone_number'=>'required|numeric',
            'address'=>'required|max:255',
        ]);

      $user = User::find(Auth::user()->id);
      $user->url_token = str_random(6);

      $input = ['address' => $request['address'], 
                'phone_number' => $request['phone_number'],
                'url_token' => Auth::user()->address_url_token
                ];

        $addresses->fill($input)->save();
        $user->save();

        return redirect()->route('user.address.update', array($user->name, $user->url_token))
                        ->with('alert-success', 'Credentials Updated Successfully');

    }

    public function UpdatePassword(Request $request)
    {
      
      $user = User::find(Auth::user()->id);
      $fileName = 'null';
      $destinationPath = base_path() . '/public/uploads/images/';

        // if ($request->hasFile('clerk_picture')) {

        //     $extension = $request->file('clerk_picture')->getClientOriginalExtension();
        //     $fileName = uniqid().'.'.$extension;
        //     $request->file('clerk_picture')->move($destinationPath, $fileName);
        // }

        $fileName = 'null';
        if (Input::file('clerk_picture')) {
            if(Input::file('clerk_picture')->isValid()){
            $destinationPath = base_path() . '/public/uploads/images/';
            $extension = Input::file('clerk_picture')->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;

            Input::file('clerk_picture')->move($destinationPath, $fileName);
          }
       }

         $user->url_token = str_random(6);

         $this->validate($request, [
            'name'=>'required|max:255',
            'email'=>'required|email',
            'password'=>'required|min:6|confirmed',
            //'clerk_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'age' => 'required',
        ]);

        if($fileName == 'null'){
          $input = ['name' => $request['name'], 
                    'email' => $request['email'], 
                    'password' => bcrypt($request['password']),
                    'age' => $request['age']                  
                  ];

          $user->fill($input)->save();
      } else{
          $input = ['name' => $request['name'], 
                    'email' => $request['email'], 
                    'password' => bcrypt($request['password']),
                    'age' => $request['age'],
                    'clerk_picture' => $fileName
                  ];

          $user->fill($input)->save();
      }
        return redirect()->route('user.password.update', array($user->name, $user->url_token))
                        ->with('alert-success', 'Credentials Updated Successfully');
    }
}
