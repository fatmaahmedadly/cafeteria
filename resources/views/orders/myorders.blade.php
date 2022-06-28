<body>
@extends('layouts.app')
@section('mycontent')
<form action="{{route('category.myorder')}}" method="get">
<input type="date" name="date" class="form-control">
<button type="submit" class="btn btn-primary"> search</button>
</form>
<table class="table table-bordered">
    <tbody>
            <tr>
                <th>Order date</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
        </tr>  
            @foreach($data as $s)
        <tr>
            <td>
            <button class="btn btn-sm btn-light" >+</button>{{$s->created_at}}</td>
            <td>{{$s->totalmoney}}</td>
            <td>processing</td>
            <td><button class="btn btn-danger">x</button></td>
        </tr>
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