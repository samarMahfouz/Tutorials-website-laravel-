@extends('layouts.app')

@section('content')
<div class="articlepage">
    <div class="container">

      <div class="row spans">
        <span class="chef-name text-right col-md-6">By: {{$post->user->name}}</span>
        <span class="date  col-md-6">Date: {{ $post->updated_at->format('Y.m.d') }}
</span>
        </div>
      <div class="row article-con">
        <h1 class="text-center col-sm-12">{{$post->name}}</h1>

        <div class="col-sm-4 article-in">
          <img class="image  special-img" src="{{'../../storage/'
          .$post->image}}">

        </div>
        <div class=" col-md-6 col-sm-8 col-sm-12">
          <div class="st-p">
            <p class="lead">{!! $post->content !!}</p>
            </div>
          </div>
        <div class="col-lg-2 col-md-12 hidden-xs">
          <h4 class="text-center">more courses</h4>
          <div class="pro-third-sec">
            <div class="row">
              @foreach($random as $post)
             <a href="/posts/{{$post->id}}"  class=" col-lg-12  col-sm-6 col-md-4">
              <div class="article">
                <h2 class="text-center col-sm-12">{{$post->name}}</h2>
                    <img class="image  special-img" src="{{'../../storage/'
                    .$post->image}}">
              </div>
            </a>
              @endforeach
            </div>
          </div>
          </div>
      </div>
      <div class="clearfix"></div>
      @if(Auth::user())
      @foreach($errors->all() as $error)
        <p  ><span class="btn btn-danger">Write a comment,  {{ $error }}</span> </p>
      @endforeach
    <form class="comment" method="POST" action="{{ route('comments.store', $post->id) }}" >
      <h3>write your comment</h3>
      {{csrf_field()}}
      <input type="hidden" name="user_id" class="form-control" value="{{Auth::user()->id}}">
     <div class="form-group">
       <input type="text" name="body" class="form-control" placeholder="the title">
     </div>
       <button type="submit" class="btn btn-primary">Enter</button>
    </form>
      @else
      <a href="{{ route('login') }}" class="btn btn-danger btn sm">
        you should login to write comment

      </a>
      @endif
      <div class="comments">
        <h3>comments</h3>
        @foreach($post->comments as $comment)

        <div class="row">
          <h5 class="col-sm-2 col-lg-1">{{$comment->user->name}}</h5>
          <p class="col-sm-10">{{$comment->body}}</p>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- END SIGN UP FORM -->

@endsection
@section('foot')
<!-- START FOOTER -->
<footer class="van">
  <div class="container">
    <section >
      <span class=" text-center">copyright &copy; 2020 by samar mahfouz </span>
    </section>
  </div>
</footer>
<!-- END FOOTER -->
@endsection
