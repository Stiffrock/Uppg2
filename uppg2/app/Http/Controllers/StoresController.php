<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Support\Facades\DB;

class StoresController extends Controller
{


  public function index(){
    $products = Store::all();
    return response()->json($products);
  }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
}
