<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderCart;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* if(request()->date)
        {
            //$orders = Order::all();
            $data=OrderCart::whereDate('created_at', request()->date)->get();
        }else{
            //$orders = Order::all();
            $data=OrderCart::all();
        }*/
        $data=OrderCart::all();
       
        return view ("orders/orders",compact('data'));
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
    public function store(Request $request )

    {
       if($request->product_name=="")
       {
    return redirect()->back()->with('delete','Please,Add Order');
       } 
        $user=auth()->user();
        $data_user=User::find($request->user_id);
        if($user->id =="1")
        {
            $f=OrderCart::create([
                "user_name"=>$data_user->name,
                "email"=>$data_user->email,
                "amount"=>$request->amount,
                "totalmoney"=>$request->totalmoney,
                "room_no"=>$data_user->room_no,
                "ext"=>$data_user->ext,
                "notes"=>$request->notes,
                "user_id"=>$request->user_id,
             ]);
        }
        
        else{
            $f=OrderCart::create([
                "user_name"=>$user->name,
                "email"=>$user->email,
                "amount"=>$request->amount,
                "totalmoney"=>$request->totalmoney,
                "room_no"=>$user->room_no,
                "ext"=>$user->ext,
                "notes"=>$request->notes,
                "user_id"=>$user->id,
             ]);
        }
        
        foreach($request->product_name as $key=>$k){
            Order::create([
                "product_name"=>$request->product_name[$key],
                "quantity"=>$request->quantity[$key],
                "price"=>$request->price[$key],
                "image"=>$request->image[$key],
                "order_cart_id"=>$f->id,
               ]);
              
        }
        $user_order=Cart::where('user_id',$user->id);
        $user_order->delete();

        return redirect()-> back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
