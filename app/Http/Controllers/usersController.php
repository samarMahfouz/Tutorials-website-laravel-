<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Post;

class usersController extends Controller
{
  public function index()
  {
      return view('users.index')->with('users', User::all());

  }
  public function create()
  {
      //
      return view('users.create');

  }
  public function makeAdmin(User $user)
  {
      $user->role = "admin";
      $user->save();
      return redirect(route('users.home'));

  }
  public function profile($id)
  {
    $user = User::find($id);
    $profile = $user->profile;
    $posts = Post::where("user_id", "=", $user->id)->get();

      return view('frontend.profile', [ 'user' => $user, 'profile' => $profile, 'posts' => $posts]);
  }
  public function edit(User $user)
  {
    $profile = $user->profile;
      return view('users.edit', ['user' =>$user, 'profile' => $profile]);
  }
  public function update(User $user, Request $request){
    $profile = $user->profile;
    $data = $request->all();
    if($request->hasFile('image')) {
      $image = $request->image->store('profilesimage', 'public');
      $data['image'] = $image;
    }

    $profile->update($data);
    return redirect(route('home'));
  }
  public function delete(User $user)
  {
    $user->delete();
    session()->flash('success', 'User deleted successfully');
    return redirect(route('users.home'));
  }

}
