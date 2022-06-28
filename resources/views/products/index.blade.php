@extends('layouts.app')
@section('mycontent')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-center">
            <a class="btn btn-primary" href="{{ route('products.create') }}"> Create New Product</a>
        </div>
        </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table">
            <thead class=" table-warning ">
                <tr class="thead">
                    <th scope="col ">Product</th>
                    <th scope="col ">Price</th>
                    <th scope="col ">photo</th>
                    <th scope="col ">Action</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($products as $s)
            <tr>
                <td>{{ $s->name }}</td>
                <td>{{ $s->price }}</td>
                <td><img src="/uploads/images/{{$s->image }}" width="70px" height="70px"></td>
                <td>
                    <a class="btn btn-sm btn-info" href="#">Available</a>
                    <a class="btn btn-sm btn-primary" href="{{ route('products.edit',$s->id) }}">Edit</a>
                    <form action="{{ route('products.destroy',$s->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
</tbody>
</table>
@endsection

@section('section2')
<link rel="stylesheet" href="css/product.css">
@endsection