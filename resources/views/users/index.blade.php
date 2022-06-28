<body>
@extends('layouts.app')
@section('mycontent')
@include('layouts.session')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All users</h2>
            </div>
            <div class="pull-center">
                <a class="btn btn-success" href="{{ route('client.create') }}"> Add user</a>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Room</th>
            <th>Image</th>
            <th>Ext</th>
            <th>Action</th>
        </tr>
        @foreach ($users as $v)
        <tr>
                <td>{{ $v->name }}</td>
                <td>{{ $v->room_no }}</td>
                <td><img src="/uploads/images/{{$v->profile_picture}}" width="100px"></td>
                <td>{{ $v->ext }}</td>
                
                <td>
                     <a class="btn btn-sm btn-primary" href="{{ route('client.edit',$v->id) }}">Edit</a>
                     
                    <form action="{{ route('client.destroy',$v->id) }}" method="POST">
                        @csrf
                        
                        @method('DELETE')
                        
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                       
                    </form>
                   
                </td>
                
        </tr>
        @endforeach
    </table>
@endsection
@section('section2')
<link rel="stylesheet" href="css/home.css">
@endsection
</body>