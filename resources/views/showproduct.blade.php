<!DOCTYPE html>
<html>
<head>
  <title>Product Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
      .form-group {
        padding: 6px 0 0 0;
      }
    </style>
</head>
<body>
   <x-header/>
  <div class="container">
      <div class="row">
        <div class="col w-50 md-4 col-md-offset-4" style="margin-top:20px">
          <h1 class="text-center">Add Product</h1>
           <button class="btn btn-danger mb-4"><a href="{{url('allproducts')}}" style="text-decoration: none;color: #fff">All Products</a></button></button>

          <div class="card w-50 col-md-offset-4 m-auto">
          <div class="card-body">
          <form action="{{route('addproduct-data')}}" method="POST" enctype="multipart/form-data">
         @csrf
          
            <div class="form-group">
              <label for="name">Product Title</label>
              <input type="text" class="form-control" placeholder="Product Title" value="{{old('name')}}" name="name" id="">
              <span class="text-danger">@error('name') {{$message}} @enderror</span>
            </div>

            <div class="form-group">
              <label for="sku">Product SKU</label>
              <input type="text" class="form-control" placeholder="Product SKU" value="{{old('description')}}" name="sku" id="">
              <span class="text-danger">@error('description') {{$message}} @enderror</span>
            </div>


            <div class="form-group">
              <label for="price"> Sale Price </label>
              <input type="text" class="form-control" placeholder=" Sale Price " value="{{old('price')}}" name="price" id="">
              <span class="text-danger">@error('price') {{$message}} @enderror</span>
            </div>

             <div class="form-group">
              <label for="file">Image</label>
              <input type="file" class="form-control" placeholder="file" value="{{old('file')}}" name="file" id="">
              <span class="text-danger">@error('file') {{$message}} @enderror</span>
            </div>

            <div class="form-group mt-4">
              <button class="btn btn-block btn-primary" type="submit">Add Product</button>    
          </div>
         
          </form>
          </div>
        </div>
        </div>
      </div>
    </div>
</body>
</html>
    
