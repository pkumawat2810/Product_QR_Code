<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Http\Request;
use QRCode;

class ProductController extends Controller
{
    public function showProduct(){
    	 // return view('showproduct');
    	 return view('showproduct');
    	// return 'hleo';
    }

       public function addproductData(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'file' => 'required',            
        ]);

        $file = $request->file('file');
        // dd($file);
        $filename = $file->getClientOriginalName();
        $destinatinPath="img";
        $file->move($destinatinPath,$file->getClientOriginalName());

        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->file= $filename;
          $html ="Name-".$product->name."\n"."SKU-".$product->sku."\n"."Price-".$product->price."\n"."Image-".$product->file."\n";

        $QRCODE = "img/".$product->sku.'.png';
        QRCode::text($html)
		->setSize(8)
		->setMargin(2)
		->setOutfile($QRCODE)
		->png();
		 $product->product_qrcode = $QRCODE;
        $req = $product->save();

        if($req){
            return redirect('allproducts')->with('success','Your Product added successfully');
        }else{
            return back()->with('fail','Something wrong');
        }

    }

     public function product(){
        $products = DB::table('products')->get();
        // dd($products);
        return view('allproduct',['products'=>$products]);
    }

    public function edit($id)
    {
     $products = DB::table('products')->find($id);
     return view('editproduct',['products'=>$products]);
    }

    public function update(Request $req, $id)
    {	 $file = $req->file('file');
        // dd($file);
        $filename = $file->getClientOriginalName();
        $destinatinPath="img";
        $file->move($destinatinPath,$file->getClientOriginalName());

        DB::table('products')->where('id',$id)->update([

        

            'name'=>$req->name,
            'sku'=>$req->sku,
            'price'=>$req->price,
            'file'=>$filename,
        ]);
        return redirect('allproducts')->with('status', 'Product updated');
    }

    public function destroy($id)
    {
        DB::table('products')->where('id',$id)->delete();
        return redirect('allproducts')->with('status', 'Product deleted');
    }

     public function qrcode()
    {
        return view('qrCode');
    }
}
