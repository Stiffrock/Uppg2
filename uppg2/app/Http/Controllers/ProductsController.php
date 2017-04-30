<?php

namespace App\Http\Controllers;


use App\Product;
use App\Http\Controllers\Store;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
  public function index(){
    $products = Product::all();
    return response()->json($products);
  }

  public function show($id){
    $product = Product::find($id);
    $product->stores = $product->stores;
    $product->reviews = $product->reviews;
    return response()->json($product);
  }

  public function create(Request $request){
  $product = Product::create($request->all());

  $products_id = DB::connection()->getPdo()->lastInsertId();
  foreach ($request->get("stores") as $store) {
    DB::table('product_store')->insert(
          [
            "product_id" => $products_id,
            "store_id" => $store
          ]
        );
  //  $newEntry = Store::create($product->id, $product->id);
  }
  return response()->json([
       "success" => true
     ]);

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
