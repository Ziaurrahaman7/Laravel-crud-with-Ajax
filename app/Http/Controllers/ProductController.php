<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index(){
  $products =  Product::latest()->paginate(5);
    return view('product', compact('products'));
  }

  public function store(Request $request, Product $product){
        $data = $request->validate([
            'title'=>'required',
            'price'=>'required|integer'
        ]);
        $response = Product::create($data);
        return response()->json([
            'status'=>200,
            'message'=>'succcesfully done',
            'data'=>$response
        ]);
  }
  public function update(Request $request, Product $product){
    $data = $request->validate([
        'title'=>'required',
        'price'=>'required|integer'
    ]);
    $response = $product->update($data);
    return response()->json([
        'status'=>200,
        'message'=>'succcesfully done',
        'data'=>$response
    ]);  
  }

  public function destroy(Product $product){
    $response = $product->delete();
    return response()->json([
      'status'=>200,
      'message'=>'succcesfully deleted',
      'data'=>$response
  ]);  
  }

  public function paginate(Request $request){
    $products =  Product::latest()->paginate(5);
    return view('product_paginate', compact('products'))->render();
  }
  
  public function search(Request $request){
    $products = Product::where('title', 'LIKE' , '%'.$request->search.'%')->
    orWhere('price', 'LIKE', '%'.$request->search.'%')->orderBy('id', 'desc')->paginate(5);

   if($products->count() >=1){
    return view('product_paginate', compact('products'))->render();
   }else{
    return response()->json([
      'status'=>404
    ]);
   }
  }
}
