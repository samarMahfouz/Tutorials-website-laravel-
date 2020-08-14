<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use App\User;

class commentsController extends Controller
{

    public function showComments() {
    $comments = Comment::all();
    return view('content.posts', compact('comments'));
  }
    public function slideComments() {
    $comments = Comment::all();
    return view('content.posts', compact('comments'));
  }
    public function commentNew(Post $post, User $user){
      $this->validate(request(), [
        'body'  => 'required',
      ]);
       Comment::create([
         'body'     => request('body'),
         'user_id'     => request('user_id'),
         'post_id'  => $post->id
      ]);
      return back();
    }
}
