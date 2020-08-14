<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
    'post_id', 'body', 'user_id'
  ];
    //
    public function post(){
      return $this->belognsTo(Post::class);
    }
    public function user() {
      return $this->belongsTo(User::class, 'user_id');
    }
}
