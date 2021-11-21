<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name');
public function posts()
{
  return $this->hasMany('App\Post');
}
public function products()
{
  return $this->hasMany('App\Products');
}
}
