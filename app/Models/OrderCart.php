<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCart extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_name',
        'email',
        'amount',
        'totalmoney',
        'room_no',
        'ext',
        'notes',
        'user_id'
    ];
    public  function user()
    {
        return $this->belongsTo(User::class);
    }
    public  function order()
    {
        return $this->hasMany(Order::class);
    }
}
