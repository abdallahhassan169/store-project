<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
  protected $table = 'billings';
  public $timestamps = true;
  protected $fillable = array('first_name', 'last_name', 'company_name', 'country','delivery_address','post_code','city','email','phone');

}
