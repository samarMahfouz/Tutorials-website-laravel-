<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\postsRequest;
use App\Http\Requests\updatePostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use App\Profile;
use App\Category;
use App\Tag;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $profile = Auth::user()->profile;
        $posts = Post::where("user_id", "=", Auth::user()->id)->get();
        $user = Auth::user()->id;
        return view('home', [ 'profile' => $profile, 'posts' => $posts]);
    }
}
