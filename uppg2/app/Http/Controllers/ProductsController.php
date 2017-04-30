<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
  public function index(){
    $products = Product::all();
    return response()->json($products);
  }

  public function show($id){
    $product = Product::find($id);
  //  $product->reviews = $product->reviews;
    $product->stores = $product->stores;
    return response()->json($product);
  }

  public function create(Request $request){
  $product = Product::create($request->all());

  foreach ($request->get("stores") as $store) {
    $newEntry = Store::create($product->id, $product->id);
  }
  return response()->json($product);
}

  public function update(Request $request, $id){
    $product = Product::find($id);
    $product->title = $request->input('title');
    $product->brand = $request->input('brand');
    $product->price = $request->input('price');
    $product->description = $request->input('description');
    $product->image = $request->input('image');
    $product->save();

    return responce()->json($product);
  }

  public function delete($id){
    $product = Product::find($id);
    $product->delete();

    return response()->json('Removed successfully');
  }


}
