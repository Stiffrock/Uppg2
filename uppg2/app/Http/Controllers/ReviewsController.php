<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Support\Facades\DB;

class ReviewsController extends Controller
{


  public function index(){
    $products = Review::all();
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
