<body>
@extends('layouts.app')
@section('section2')
<link rel="stylesheet" href="css/orders.css">
@endsection
@section('mycontent')

<table class="table table-bordered">
        <thead>
            <th>Order date</th>
            <th>Name</th>
            <th>Room</th>
            <th>Ext</th>
            <th>Action</th>
        </thead>
        <tbody>
        @foreach($data as $k)
        <tr>
            <td>
            <button type="submit" class="btn btn-sm btn-light" onclick="$('#t1-{{$k->id}}').toggle('slow')">{{$k->created_at}}</button>
            </td>
            <td>{{$k->user_name}}</td>
            <td>{{$k->room_no}}</td>
            <td>{{$k->ext}}</td>
            <td>deliver</td>
            
        </tr>
        @foreach($k->order as $or)
        <tbody id="t1-{{$k->id}}" style="display:none">
            <tr>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                  
            </tr>  
           
            <tr>
                <td><img src="uploads/images/{{$or->image}}" style="height:60px;width:60px" class="card-img-top" alt="..."></td>
                <td>{{$or->price}}</td>
                <td>{{$or->quantity}}</td>
            </tr>
            @endforeach
        </tbody>
        
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