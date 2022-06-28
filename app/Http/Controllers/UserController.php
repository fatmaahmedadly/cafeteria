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
        return view("auth/register")->with('add','Greate');;
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
            "RoomNo"=> "required",
            "ProfilePicture"=> "required",
            "Ext"=> "required",
           ]);
           $image = $request->file("Profile Picture");

           if($image){
               $imageDestinationPath ="uploads/images/";
               $clientimage = date("YmdHis").".".$image->getClientOriginalExtension();
               $image->move($imageDestinationPath,$clientimage);
               $request->image = $clientimage;
           }
    
          User::create([
          "name"=>$request->name,
         "RoomNo"=>$request->RoomNo ,
         "ProfilePicture"=>$request->image,
         "Ext"=>$request->category,
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
    public function edit(User $user)
    {
        return view("users/edit",["users"=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request_data =$request->all();
        $request->validate([
            "name"=> "required",
            "RoomNo"=> "required",
            "ProfilePicture"=> "required",
            "Ext"=> "required",
           ]);
           $image = $request->file("ProfilePicture");
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
