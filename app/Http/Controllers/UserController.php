<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view ("users/index",["users"=>$users]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users/adduser");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required",
            "email"=> "required",
            "password"=> "required",
            "room_no"=> "required",
            "ext"=> "required",
            "profile_picture"=> "required",
            
           ]);
           $image = $request->file("profile_picture");

           if($image){
               $imageDestinationPath ="uploads/images/";
               $clientimage = date("YmdHis").".".$image->getClientOriginalExtension();
               $image->move($imageDestinationPath,$clientimage);
               $request->profile_picture= $clientimage;
           }
    
          User::create([
          "name"=>$request->name,
          "email"=>$request->email,
          "password"=>$request->password,
         "room_no"=>$request->room_no ,
         "ext"=>$request->ext,
         "profile_picture"=>$request->profile_picture,
         ]);
         return redirect()->route("client.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $data_user=User::find($user);
        return view("users/edit",compact('data_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user)
    {
        
       $request_data=$request->all();
       //dd($request_data);
        $request->validate([
            "name"=> "required",
            "email"=> "required",
            "password"=> "required",
            "room_no"=> "required",
            "ext"=> "required",
            "profile_picture"=> "required",
            
           ]);
        $image = $request->file("profile_picture");
           if($image){
            $imageDestinationPath ="uploads/images/";
            $clientimage = date("YmdHis").".".$image->getClientOriginalExtension();
               $image->move($imageDestinationPath,$clientimage);
               $request->image = $clientimage;
            $request_data["image"]=$clientimage;
        }
        $user->update($request_data);
        return redirect()->route("client.index",$user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        if($user==1)
        {
            return redirect()->route('client.index')->with('delete','ooops I am Admin');  
        }
        $deleteddata=User::find($user);
        $deleteddata->delete();
        return redirect()->route('client.index') ->with('delete1','Deleted');
    }
  

}
