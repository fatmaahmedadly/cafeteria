<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth()->user();//بيجيب بيانات اليوزير اللى داخل 
        $allcarts=$user->carts;
        $floos=Cart::where('user_id',$user->id)->sum('price');
        //dd($floos);
       return view('home', compact('allcarts','floos'));
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
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function addcart(Request $request,$id)
    {
    $cart_data=Product::find($id);
    $user=Auth()->user();
   $total_price=($request->quantity * $cart_data->price); 
    Cart::create([
        "product_name"=> $cart_data->name,
        "price"=> $total_price,
        "quantity"=> $request->quantity,
        "image"=> $cart_data->image,     
        "user_id"=> $user->id, 
        "product_id"=>$cart_data->id,    
    ]);
   return redirect()->back();
 }
 public function destroy(Cart $cart)
 {
     //
     $cart->delete();
     return redirect()->back();   
     
     
 }
 public function increment(Request $request ,$id)
 {
    $increment=Cart::where('id',$id)->increment('quantity');
    $cart_data=Cart::find($id);
    $original_data=Product::find($cart_data->product_id);
    $cart_data->price=$original_data->price * $cart_data->quantity;
    $cart_data->save();
    return redirect()->back();
 }
 public function decrement(Request $request ,$id)
 {
    $decrement=Cart::where('id',$id)->decrement('quantity');
    $cart_data=Cart::find($id);
    $original_data=Product::find($cart_data->product_id);
    $cart_data->price=$original_data->price * $cart_data->quantity;
    $cart_data->save();
    return redirect()->back();
 }
 

}
