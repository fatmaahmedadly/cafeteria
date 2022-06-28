<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allproducts=Product::all();
        $allusers=User::all();  //to show  allusers in dropdown
        $user=Auth()->user();   //to show  data of login user
        $allcarts=$user->carts;
        $floos=Cart::where('user_id',$user->id)->sum('price');
        $amount=Cart::where('user_id',$user->id)->count('quantity');
         
        return view('home', compact('allproducts','allusers','allcarts','floos','amount'));
       
    }
   
}
