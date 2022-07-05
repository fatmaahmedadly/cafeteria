<body style="  background:rgb(212, 171, 121);  margin:0;padding:0;font-family: Adobe Garamond Pro Bold;">
@extends('layouts.app')
@section('mycontent')
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
    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong style="margin-left:40px;">Product:</strong>
                   <center> <input type="text" name="name" class="form-control" placeholder="product" value="{{ $product->name }}" style=" width:45%; border-radius: 5px 5px 5px 5px;
                   background-color: rgb(226, 209, 188); margin-left:-40%;"><center>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong style="margin-left:40px;">Price:</strong>
                    <center><input type="number"  name="price"  value="{{$product->price}}"class="form-control" id="amountInput"
                    style=" width:45%; border-radius: 5px 5px 5px 5px;background-color: rgb(226, 209, 188);margin-left:-650px;"></center>
            </div> 
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong style="margin-left:40px;">Category:</strong>
                    <select style="margin-left:10px;" name="category" >
                        
                          <option disabled selected > Category </option>
                                 <option value="hot drink">hot drink</option>
                                 <option value="fresh drink"> fresh drink</option>
                                 <option value="cold drink">cold drink</option>
                                <option value="ice cream">ice cream</option>
                               
                                </select>
                    &nbsp&nbsp&nbsp<a href="#" style="color:#351801;">Add Category</a>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong style="margin-left:40px;">Image:</strong>
                    <center><input type="file" name="image" class="form-control" placeholder="Product Image"style=" width:45%; border-radius: 5px 5px 5px 5px;background-color: rgb(226, 209, 188);margin-left:-650;"></center>
                    <img src="/uploads/images/{{ $product->image }}" width="200px">
                </div>
            </div><br><br> 
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" style="  background-color: rgb(26, 16, 4);
   cursor: pointer;
   width: 120px;
   height: 40px;
   border-radius: 5px 5px 5px 5px;
   text-align: center;
   color: rgb(226, 209, 188);
   font-style: oblique;
   margin-left: -60px;
   margin-top: 10px;
   ">Add Product</button>
            </div>
        </div>
    </form>
@endsection
</body>