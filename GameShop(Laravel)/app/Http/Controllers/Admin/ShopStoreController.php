<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ShopSetting;


class ShopStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $shop = ShopSetting::find(1);
        return view('AdminDashboard.ShopStoreShow', compact('shop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
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

    public function shopstoresettingsshow($id){
        $shop = ShopSetting::find($id);
        return view('AdminDashboard.ShopSetting',  compact('shop'));
    }

    public function disableshop(Request $request, $id){

        $this->validate($request, [
            'title' => 'nullable|max:255',
            'description' => 'required',
            'titleF_User' => 'nullable|max:255',
            'descriptionF_User' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
            'expired_at' => 'nullable'
            
        ]); 

        $shop = ShopSetting::findOrFail($id);

        if($request->title != ''){
            $shop->title = $request->title;
        } if($request->description != ''){
            $shop->description = $request->description;
        } if($request->titleF_User != ''){
            $shop->titleF_User = $request->titleF_User;
        } if($request->descriptionF_User != ''){
            $shop->descriptionF_User = $request->descriptionF_User;
        } if($request->expired_at != ''){
            $shop->expired_at = $request->expired_at;
        }

        $shop->status = 0;

        if($request->hasFile('picture')) {
            // store image
            $imageName = $request->file('picture')->getClientOriginalName();
            $path = base_path() . '/public/uploads/images/shop_setting/';
            $request->file('picture')->move($path , $imageName);
            $shop->picture = $imageName;
        } 

        $shop->save();
        return redirect('/home')->with('alert-success','Shop Store Hasbeen Deactivated !');


    }

    public function enableshop($id){
        $shop = ShopSetting::findOrFail($id);
        $shop->status = 1;

        $shop->save();
        return redirect('/home')->with('alert-success','Shop Store Hasbeen Activated !');
        
    }
}
