<body>
@extends('layouts.app')
@section('mycontent')
@include('layouts.session')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-center" style="padding-bottom:10px;">
                <a class="btn" style="background-color:#351801; color:white; margin-left:1157px;" href="{{ route('client.create') }}"> Add user</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <center>
   <table style="width:70%;"  >
   <thead class="tablehead">
        <tr>
            <th>Name</th>
            <th>Room</th>
            <th>Image</th>
            <th>Ext</th>
            <th>Action</th>
        </tr>
        </thead>
        @foreach ($users as $v)
        <tbody class="tablebody">
        <tr>
                <td>{{ $v->name }}</td>
                <td>{{ $v->room_no }}</td>
                <td><img src="/uploads/images/{{$v->profile_picture}}" width="70px" height="70px"></td>
                <td>{{ $v->ext }}</td>
                
                <td>
                <button class="ff"><a class="btn0" href="{{ route('client.edit',$v->id)}}">Edit</a></button>
                     
                    <form action="{{ route('client.destroy',$v->id) }}" method="POST">
                        @csrf
                        
                        @method('DELETE')
                        
                        <button style="margin: 20px;background-color: #C7965E;" type="submit" class="btn1">Delete</button>
                       
                    </form>
                   
                </td>
                
        </tr>
        @endforeach
</tbody>
    </table>
</center>
@endsection
@section('section2')
<link rel="stylesheet" href="css/allusers.css">
@endsection
</body>