<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\postsRequest;
use App\Http\Requests\updatePostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


use App\Post;
use App\Category;
use App\Profile;
use App\Tag;

class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }


    public function index()
    {
        //
        $profile = Auth::user()->profile;
        $posts = Post::where("user_id", "=", Auth::user()->id)->get();
        $user = Auth::user()->id;
        $post = Post::withTrashed()->get();
        return view('posts.index', [ 'profile' => $profile, 'posts' => $posts, 'post' => $post]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create')->with('categories', Category::all())
        ->with('tags', Tag::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(postsRequest $request)
    {
        //

        $post = Post::create([
          'name' => $request->name,
          'description' => $request->description,
          'content' => $request->content,
          'image' => $request->image->store('images', 'public'),
          'category_id' => $request->category_id,
          'user_id'  => Auth()->id()

        ]);
        if($request->tags){
          $post->tags()->attach($request->tags);
        }
        session()->flash('success', 'post created successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      $rando = Post::orderByRaw('RAND()')->take(3)->get();
      $random =  Post::where('id', '!=', $post->id) ->get() ->random(3);
      return view('frontend.post', compact('post', 'random'))->with('posts', Post::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('posts.create')
        ->with('post', $post)
        ->with('categories', Category::all())
        ->with('tags', Tag::all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updatePostRequest $request, Post $post)
    {
        $updates = $request->only(['name', 'description', 'contents']);
        if($request->hasFile('image')) {
          $img = $request->image->store('images', 'public');
          Storage::disk('public')->delete($post->image);
          $updates['image'] = $img;
        }
        $post->update($updates);
        session()->flash('success', 'post updated successfully');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::withTrashed()->where('id', $id)->first();
      if($post->trashed()){
        $post->forceDelete();
      }else{
        $post->delete();
      }
        session()->flash('success', 'post deleted successfully');
        return redirect(route('posts.index'));
    }
    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();
        return view('posts.index')->withPosts($trashed);
    }
}
