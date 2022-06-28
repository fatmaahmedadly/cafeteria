<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =['product_name','price','quantity','image','order_cart_id'];


    public  function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public  function user()
    {
        return $this->belongsTo(User::class);
    }
    public  function ordercart()
    {
        return $this->belongsTo(OrderCart::class);
    }
     
}
