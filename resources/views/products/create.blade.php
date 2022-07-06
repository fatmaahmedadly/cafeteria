<body style="   background-image: linear-gradient(57deg,rgb(235, 203, 168)0%, rgb(229 187 139)47%, rgb(240, 165, 80)100%);  margin:0;padding:0;font-family: Adobe Garamond Pro Bold;">

@extends('layouts.app')
@section('section2')
<link rel="stylesheet" href="css/addproduct.css">
@endsection
@section('mycontent')
@include('layouts.session')

    <div class="row" >
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style=" font-style: oblique;"> <img src="/uploads/images/3.jpg" style= "width: 5%;
    border-radius: 50% 50% 50% 50%; margin-left: 5px; " > Add Product</h2>
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
                   <strong style="margin-left:300px;">Product:</strong>
                   <center> <input type="text" name="name" class="form-control" placeholder="product" value="{{ old('product') }}" style=" width:45%; border-radius: 5px 5px 5px 5px;
        background-color: rgb(226, 209, 188); "></center>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong style="margin-left:300px;" >Price:</strong>
                   <center> <input type="number"  name="price" class="form-control" id="amountInput" placeholder="price"
                    style=" width:45%; border-radius: 5px 5px 5px 5px;background-color: rgb(226, 209, 188);"></center>
            </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong style="margin-left:300px;">Category:</strong>
                    <select style="margin-left:75px;" name="category">
                        
                          <option  disabled selected>Category</option>
                                 <option value="hot drink">hot drink</option>
                                 <option value="fresh drink"> fresh drink</option>
                                 <option value="cold drink">cold drink</option>
                                <option value="ice cream">ice cream</option>
                               
                                </select>
                    &nbsp&nbsp&nbsp<a href="{{route('category')}}" style="color:#351801;">Add Category</a>
                    
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong style="margin-left:300px;" >Image:</strong>
                    <input  type="file" name="image" class="form-control" placeholder="Article Image"style=" width:725px; border-radius: 5px 5px 5px 5px;background-color: rgb(226, 209, 188);margin-left:435px;"
                    >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" style="  background-color: rgb(26, 16, 4);
   cursor: pointer;
   width: 120px;
   height: 40px;
   border-radius: 5px 5px 5px 5px;
   text-align: center;
   color: rgb(226, 209, 188);
   font-style: oblique;
   margin-left: 600px;
   margin-top: 10px;
   ">Add Product</button>
            </div>
        </div>
    </form>
@endsection


</body>