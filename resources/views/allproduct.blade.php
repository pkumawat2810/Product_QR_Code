<html>
  <head>
    <title>Custom Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    
  </head>
  <body>
     <x-header/>
    <div class="container">
      <div class="row" style="height:100vh">
        <div class="col md-4 col-md-offset-4" style="margin-top:20px">
          <h1 class="text-center">Product</h1>
          <button class="btn btn-danger"><a href="product" style="text-decoration:none;color:#fff;"> Add Product </a></button>
          <div class="show">
           
  <table class="table">
    <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>SKU</th>
      <th>price</th>
      <th>Image</th>
      <th>Actions</th>
      <th>QR code</th>
    </tr>
    </thead>

    <tbody>
      @foreach($products as $products)
      <tr>
          <td>{{$products->id}}</td>
          <td>{{$products->name}}</td>
          <td>{{$products->sku}}</td>
          <td>{{$products->price}}</td>
          <td><img width="100" src="{{ asset('img/'.($products->file))}}" alt="img"></td>
          <td>
          <button class="btn-danger"><i class="fas fa-edit"></i> <a style="color: #fff; text-decoration: none; font-weight: 500;" href="{{url('/edit',$products->id)}}">Edit</a></button>
          <br><br>
          <button class="btn-danger"><i class="fas fa-trash-alt"></i> <a style="color: #fff; text-decoration: none; font-weight: 500;" href="{{url('/delete',$products->id)}}">Delete</a></button>
          </td>
          <td><img width="100" src="{{$products->product_qrcode}}" alt="img"></td>
          <!-- <td> {!! QrCode::generate('learning-points.in') !!} </td> -->
      </tr>
  @endforeach
    </tbody>
  </table>
</div>
        </div>
      </div>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>