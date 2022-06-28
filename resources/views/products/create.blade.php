<body>
@extends('layouts.app')
@section('mycontent')

@include('layouts.session')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Product</h2>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('products.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product:</strong>
                    <input type="text" name="name" class="form-control" placeholder="product" value="{{ old('product') }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number"  name="price" class="form-control" id="amountInput">
            </div> <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category:</strong>
                    <select  name="category">
                        
                          <option disabled selected>Category</option>
                                 <option value="hot drink">hot drink</option>
                                 <option value="fresh drink"> fresh drink</option>
                                 <option value="cold drink">cold drink</option>
                                <option value="ice cream">ice cream</option>
                               
                                </select>
                    &nbsp&nbsp&nbsp<a href="{{route('category')}}">Add Category</a>
                    
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="Article Image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
        </div>
    </form>
@endsection
@section('section2')
<link rel="stylesheet" href="css/addproduct.css">
@endsection
</body>