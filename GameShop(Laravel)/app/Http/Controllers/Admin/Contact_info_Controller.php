<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin_Contact_Info;

class Contact_info_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // load a view to create all informations
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aci = Admin_Contact_Info::findOrFail($id);
        return view('AdminDashboard.ContactInformations', compact('aci'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update all informations of a specific admin
        $this->validate($request, [
            'full_name' => 'required|max:255',
            'instagram' => 'required|max:255',
            'telegram' => 'required|max:255',
            'facebook' => 'required|max:255',
            'gmail' => 'required|max:255',
            'email' => 'required|email|max:255',
            'compony' => 'nullable|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'about_me' => 'nullable',
            'about_meF_User' => 'nullable',
            'phone_number' => 'nullable|numeric|min:10',
            
        ]); 

        $aci = Admin_Contact_Info::findOrFail($id);
        $aci->user_id = $request->user_id;
        $aci->full_name = $request->full_name;
        $aci->instagram = $request->instagram;
        $aci->telegram = $request->telegram;
        $aci->email = $request->email;
        $aci->facebook = $request->facebook;
        $aci->gmail = $request->gmail;

        if($request->hasFile('picture')) {
            // store image
            $imageName = $request->file('picture')->getClientOriginalName();
            $path = base_path().'/public/uploads/images/about_admin/';
            $request->file('picture')->move($path , $imageName);
            if($aci->picture != ''){
                unlink(base_path().'/public/uploads/images/about_admin/'.$aci->picture);    
            }
            $aci->picture = $imageName;
        } 
        if($request->compony != ''){
            $aci->compony = $request->compony;
        } if($request->input('description') != ''){
            $aci->about_me = $request->input('description');
        } if($request->input('descriptionF_User') != ''){
            $aci->about_meF_User = $request->input('descriptionF_User');
        } if($request->phone_number != ''){
            $aci->phone_number = $request->phone_number;
        }
            
            

        $aci->save();
        return redirect('/home')->with('alert-success','Informations Hasbeen Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 
    }
}
