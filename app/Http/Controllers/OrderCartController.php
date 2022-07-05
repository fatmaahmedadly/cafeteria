<?php

namespace App\Http\Controllers;

use App\Models\OrderCart;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
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
        $data=OrderCart::all();
      if(request()->user_select)
      {
        $users=User::where('id', request()->user_select)->get();
        return view ('orders/checks',compact('allusers','data','users'));
      }
        elseif(request()->date)
        {
            $users=User::whereDate('created_at', request()->date)->get();
            return view ('orders/checks',compact('allusers','data','users'));
        }else{
            $orders = Order::all();
            $users=User::all();
            
        }
          
       return view ('orders/checks',compact('users','data','allusers','orders'));
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
    public function update(Request $request, $orderCart)
    {
       
        $v=Ordercart::find($orderCart);
        $v->status=$request['status_select'];
        $v->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderCart  $orderCart
     * @return \Illuminate\Http\Response
     */
    public function destroy($orderCart)
    {
        $remove = Ordercart::find($orderCart);
        $remove->delete();
        return redirect()->back();
    }
}
