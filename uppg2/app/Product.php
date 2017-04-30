<?php

namespace App;

use App\Review;
use App\Store;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

  protected $fillable = ['title', 'brand', 'price', 'image', 'description'];

  public function stores(){
    return $this->belongsToMany('App\Store');
  }
  public function reviews(){
    return $this->hasMany('App\Review');
  }

/*  public function getPrice(){
    return $this->price;
  }
  public function getTitle(){
    return $this->title;
  }
  public function getImage(){
    return $this->image;
  }
  public function getdescription(){
    return $this->description;
  }*/
}
