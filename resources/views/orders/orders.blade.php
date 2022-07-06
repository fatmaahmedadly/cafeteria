<body>
@extends('layouts.app')
@section('section2')
<link rel="stylesheet" href="css/orders.css">
@endsection
@section('mycontent')
<center>
<table class="t1">
    
        <thead >
        <tr>
        <th scope="col">Order Date</th>
        <th scope="col">name</th>
        <th scope="col">room</th>
        <th scope="col">Ext</th>
        <th scope="col">Action</th>
        
      </tr>
        </thead>
        <tbody>
        @foreach($data as $k)
        <tr class="so">
            <td>
            <button type="submit" class="btn btn-sm btn-light" onclick="$('#t1-{{$k->id}}').toggle('slow')">{{$k->created_at}}</button>
            </td>
            <td>{{$k->user_name}}</td>
            <td>{{$k->room_no}}</td>
            <td>{{$k->ext}}</td>
            <td>
            <form action="{{route('ordercart.update',$k->id)}}" method="post">
                @csrf
                @method('PUT')
<select class="form-select" aria-label="Default select example" name="status_select">
<option selected disabled>Status</option>
<option selected value="processing" >processing</option>
<option selected value="deliver">out for delivery</option>
<option selected value="done">done</option>
</select>
<button type="submit" class="btn1">Submit</button>
</form>
            </td>
            
        </tr>
        @foreach($k->order as $or)
        <tbody id="t1-{{$k->id}}" style="display:none">
            <tr class="tt">
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th></th>
                <th></th>
                  
            </tr>  
           
            <tr>
                <td><img src="uploads/images/{{$or->image}}" style="height:60px;width:60px" class="card-img-top" alt="..."></td>
                <td>{{$or->price}}</td>
                <td>{{$or->quantity}}</td>
                <td></td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
        
        @endforeach
    
       
</tbody> 
      
</table></center> 

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