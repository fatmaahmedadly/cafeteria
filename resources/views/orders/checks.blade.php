
<body>
@extends('layouts.app')
@section('section2')
<link rel="stylesheet" href="css/checks.css">
@endsection
@section('mycontent')
<div class="main">
<form action="{{route('ordercart.index')}}" method="get">
<input type="date" name="date" class="form-control">
<select class="form-select" aria-label="Default select example" name="user_select" id="user_select">
<option selected disabled>user</option>
  @foreach($allusers as $user)
  <option value="{{$user->id}}">{{$user->name}}</option>
  @endforeach
</select>
<button type="submit" class="btn btn-primary"> search</button>
</form>


<table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Total Amount</th>
        </tr>
        @foreach($users as $k)
        <tr>
            @if($k->ordercart->sum('totalmoney')>0)
            <td> 
                <button class="btn btn-sm btn-light" onclick="$('#t1-{{$k->id}}').toggle('slow')">+</button>
                    {{$k->name}}
            </td>
            <td> {{$k->ordercart->sum('totalmoney')}}</td>
            @endif
        </tr>
        <tbody id="t1-{{$k->id}}" style="display:none">
            <tr>
                <th>Order date</th>
                <th>Price</th>

            </tr>  
            @foreach($k->ordercart as $v)
            <tr>
            <td>
            <button class="btn btn-sm btn-light" onclick="$('#items-{{$v->id}}').toggle('slow')">+</button>
                {{$v->created_at}}</td>
            <td>{{$v->totalmoney}}</td>
            
            
</tr>
<div class="items" id="items-{{$v->id}}">
    <div class="row">
@foreach($v->order as $s)
<div class="col-3">
    <div class="myitem">
        <div class="image"><img src="/uploads/images/{{$s->image}}">{{$s->product_name}}</br>
        {{$s->price}}EGP</br>
        {{$s->quantity}}
    </div>
   
</div>
</div>
@endforeach
</div>
<button class="btn btn-danger delete" onclick="$('.items').hide('slow')">x</button>
</div>
@endforeach
            

 </tbody>
@endforeach
</table> 
</div>
@endsection
@section('section3')
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function()
  {

  }
)
</script>
@endsection
</body>
       
