<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'orders';
  public $timestamps = true;
  protected $fillable = array('total_price', 'quantity');

}
