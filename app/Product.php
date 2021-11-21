<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = 'products';
  public $timestamps = true;
  protected $fillable = array('name', 'category', 'price', 'old_price','description','brand','color','image');
  public function category()
  {
    return $this->belongsto('App\Category');
  }
}
