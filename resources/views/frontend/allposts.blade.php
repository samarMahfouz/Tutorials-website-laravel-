@extends('layouts.app')

@section('content')
<!-- START MAIN RECIPES SECTION-->
    <div class="recipes-page">
      <h1 class="text-center">All courses</h1>
      <div class="container">
          <div class="row">
            @foreach($posts as $post)
            <a href="/posts/{{$post->id}}">
              <div class="article col-sm-6  t-c col-md-4">
                  <div class="image image-div">
                    <img class="image" src="{{'storage/'
                    .$post->image}}">
                  </div>
                  <div class="article-content a-styling">
                    <h3>{{$post->name}}</h3>
                    <p>{{$post->description}}</p>
                    <p> Chef :: {{$post->user->name}} </p>
                    <p> Category : {{$post->category->name}} </p>
                    <a href="{{ route('posts.show', $post->id) }}">read more</a>
                  </div>
              </div>
            </a>
            @endforeach
          </div>
        </div>
      </div>
      <!-- END MAIN RECIPES  -->
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
