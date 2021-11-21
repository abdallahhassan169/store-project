<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
  protected $table = 'posts';
  public $timestamps = true;
  protected $fillable = array('gmail', 'phone', 'facebook', 'instagram','address','twitter');

}
