<html>
  <head>
    <title>Custom Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
  </head>
  <body>
     <x-header/>
    <div class="container">
      <div class="row">
        <div class="col md-4 col-md-offset-4" style="margin-top:20px" >
          <h1 class="text-center">Product</h1>
          <button class="btn btn-danger mb-4"><a href="{{url('allproducts')}}" style="text-decoration: none;color: #fff">All Products</a></button></button>
          <!-- <button class="btn btn-danger"><a href="addproduct" style="text-decoration:none;color:#fff;"> Add Product </a></button> -->
          <div class="show">

          <form action="" method="POST" enctype="multipart/form-data">
          @csrf
            @method('PUT')

            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" placeholder="Product Name" value="{{$products->name}}" name="name" id="">
            </div>

            <div class="form-group">
              <label for="sku">Description</label>
              <input type="text" class="form-control" placeholder="sku" value="{{$products->sku}}" name="sku" id="">
            </div>


            <div class="form-group">
              <label for="price">Price</label>
              <input type="text" class="form-control" placeholder="price" value="{{$products->price}}" name="price" id="">
              <span class="text-danger">@error('price') {{$message}} @enderror</span>
            </div>

             <div class="form-group">
              <label for="file">Image</label>
              <img width="100" src="{{ asset('img/'.($products->file))}}" alt="img">
              <input type="file" class="form-control" placeholder="file" value="{{old('file')}}" name="file" id="">
              <span class="text-danger">@error('file') {{$message}} @enderror</span>
            </div>
            

            <div class="form-group mt-4">
              <button class="btn btn-block btn-primary" type="submit">Update</button>    
          </div>
          </form>
          @if (session()->has('loginId'))
          <div>
          {{session('status')}}
          </div>
          @endif  
  
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
