<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderCart;

class CategoryController extends Controller
{
    public function index()
    {
        //
        
        return redirect()->back()->with('cat','category added successfully');
      
    }
    public function myorders()
    {
        $user=Auth()->user();
        
        if(request()->date)
        {
            $data=OrderCart::whereDate('created_at', request()->date)->get();
        }else{
            $data=OrderCart::where('user_id',$user->id)->get();
        }
        return view ('orders/myorders',compact('data'));
    }
}
