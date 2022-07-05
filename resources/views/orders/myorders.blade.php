<body>
@extends('layouts.app')
@section('section2')
<link rel="stylesheet" href="css/myorders.css">
@endsection
@section('mycontent')
<form action="{{route('category.myorder')}}" method="get">
<input type="date" name="date" class="ss">
<button type="submit" class="btn btn-warning"> search</button>
</form>
<table class="tablebox">
    <thead class="tt">
            <tr>
                <th>Order date</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
        </tr>  
</thead>
            @foreach($data as $s)
        <tr>
            <td>
            <button class="btn btn-sm btn-light" onclick="$('#it-{{$s->id}}').toggle('slow')">+</button>
            {{$s->created_at}}
            </td>
            <td>{{$s->totalmoney}}</td>
            <td>{{$s->status}}</td>
            <td>
            @if($s->status =="processing")
            
               <form action="{{route('ordercart.destroy',$s->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">X</button>
        </form>
            @endif
            </td>
        </tr>
        <div class="items" id="it-{{$s->id}}">
    <div class="row">
@foreach($s->order as $ss)
<div class="col-3">
    <div class="myitem">
        <div class="image"><img src="/uploads/images/{{$ss->image}}">{{$ss->product_name}}</br>
        {{$ss->price}}EGP</br>
        {{$ss->quantity}}
    </div>
   
</div>
</div>
@endforeach
</div>
<button class="btn btn-danger delete" onclick="$('.items').hide('slow')">x</button>
</div>
            @endforeach
        </tbody>
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