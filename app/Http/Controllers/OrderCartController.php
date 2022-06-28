<?php

namespace App\Http\Controllers;

use App\Models\OrderCart;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allusers=User::all();
      if(request()->user_select)
      {
        $data=OrderCart::where('user_id', request()->user_select)->get();
      }
        elseif(request()->date)
        {
            $data=OrderCart::whereDate('created_at', request()->date)->get();
        }else{
            $orders = Order::all();
            $data=OrderCart::all();
        }
          
       return view ('orders/checks',compact('allusers','data'));
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
     * @param  \App\Models\OrderCart  $orderCart
     * @return \Illuminate\Http\Response
     */
    public function show(OrderCart $orderCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderCart  $orderCart
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderCart $orderCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderCart  $orderCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderCart $orderCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderCart  $orderCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderCart $orderCart)
    {
        //
    }
}
