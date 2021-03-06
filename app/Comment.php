<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';
    public $timestamps = true;
    protected $fillable = array('content','post_id');

    public function posts()
    {
        return $this->belongsTo('App\Post');
    }

}
