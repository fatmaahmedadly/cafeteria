<body>
@extends('layouts.app')
@if(Auth::user()->id =="1")
@section('mycontent')
    <select class="form-select" aria-label="Default select example" id="user_select">
    <option selected disabled>user</option>
    @foreach($allusers as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
    </select>
@endsection
@endif
<!--Second section-->


@section('section1')
<!--Start left side-->
<div class="row">
  <div class="col-3 left"> 
  <table class="table">
  @include('layouts.session')     
                <tr class="table-tr1">
                    <th scope="col ">Product</th>
                    <th scope="col ">Quantity</th>
                    <th scope="col "></th>
                    <th scope="col ">Price</th>
                    <th scope="col ">Action</th>
                </tr>
              
                <tbody>
                 @foreach($allcarts as $cart)
                 <tr>
                 <td>{{$cart->product_name}}</td>
                 <td>{{$cart->quantity}}</td>
<td>
<form  method="POST">
                        @csrf
                        <button type="submit" formaction="{{ route('cart.increment',$cart->id)}}" class="btn btn-sm btn-secondary">+</button>
                        <button type="submit" formaction="{{ route('cart.decrement',$cart->id)}}" class="btn btn-sm btn-secondary">-</button>
         
</form>
</td>
                 <td>{{$cart->price}}</td>
                 
<td><form action="{{ route('carts.destroy',$cart->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">x</button>
</form></td>
                 </tr>
                 @endforeach
                 </tbody>
                </table>
          <label class="label1">Total Money:</labal>
          <input type="text"  value="{{$floos}}"></br>

<form action="{{ route('orders.store')}}" method="POST">
                        @csrf
                        @foreach($allcarts as $cart)
                        <input type="text" name="product_name[]" value="{{$cart->product_name}}" hidden>
                        <input type="text" name="quantity[]" value="{{$cart->quantity}}" hidden>
                        <input type="text" name="price[]" value="{{$cart->price}}" hidden>
                        <input type="text" name="image[]" value="{{$cart->image}}" hidden>
                        @endforeach
                        <input type="text" name="user_id" id="user" hidden>
                        <input type="text" name="totalmoney" value="{{$floos}}" hidden>
                        <input type="text" name="amount" value="{{$amount}}" hidden>
                        <label>Notes:</labal>
                           <textarea class="form-control" name="notes"></textarea>
                           <input type="submit" class="button-confirm" value="Confirm">
</form> 
</div>              
  <!--End left side-->

  <!--Start right side-->
  <div class="col-8 right">  
  <div class="row">
  @foreach($allproducts as $product)
  <div class="col-3">
  <div class="card">
  <img  class= "card-img" src="uploads/images/{{$product->image}} "class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>
    <h5 class="card-title"> {{$product->price}} EGP</h5>
<form action="{{route('addcart',$product->id)}}" method="POST">
    @csrf
    <button class="button-add" type="submit"><img src='/uploads/images/cart.png' class="add" ></button>
</form>
  </div>
</div>
</div>
@endforeach
  </div>
  </div>
  </div>
  <!--third section-->

@endsection

@section('section2')
<link rel="stylesheet" href="css/home.css">
@endsection

@section('section3')
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function()
  {
$('#user_select').change(function()
{
  $('#user').val($('#user_select').val());
})
  }
)
</script>
@endsection
</body>
</html>
