
<body>
@extends('layouts.app')
@section('section2')
<link rel="stylesheet" href="css/checks.css">
@endsection
@section('mycontent')
<form action="{{route('ordercart.index')}}" method="get">
<input type="date" name="date" class="form-control">
<button type="submit" class="btn btn-primary"> search</button>
</form>

<form action="{{route('ordercart.index')}}" method="get">
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
        @foreach($data as $k)
        <tr>
            <td> 
                <button class="btn btn-sm btn-light" onclick="$('#t1-{{$k->id}}').toggle('slow')">+</button>
                    {{$k->user_name}}
            </td>
            <td> {{$k->amount}}</td>
        </tr>
        <tbody id="t1-{{$k->id}}" style="display:none">
            <tr>
                <th>Order date</th>
                <th>Price</th>
            </tr>  
            @foreach($k->order as $or)
            <tr>
            <td>
                 <button onclick="$('#myitems-{{$or->id}}').toggle('slow')"class="btn btn-sm btn-light">+</button>{{$or->created_at}}
                </td>
                <td>{{$or->price}}</td>
                
                 
            </tr>
            @endforeach
            <div style="display:none" id="myitems-{{$or->id}}">{{$or->price}}</div>

 </tbody>
@endforeach
</table> 
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
       
