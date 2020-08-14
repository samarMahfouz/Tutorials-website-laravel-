@extends('layouts.app')

@section('content')
<div class="container">
  <!-- Start header -->
 <header id="home">
  <div class="row">
    <div class="col-md-6 image-header2"></div>
    <div class="col-md-6 image-header"></div>
  </div>
 </header>
 <!-- End header -->
 <!-- Start my courses -->
 <section class="my-design inner-design">
   <div class="container">
     <h2>All courses</h2>
     <ul class="link">
       <li class="selected filter" data-filter="all">all</li>
       @foreach($cat_name as $result)
       <li  class="filter" data-filter=".{{ $result->name }}">{{ $result->name }}</li>
       @endforeach
     </ul>
     <section id="gallery" class="gallery">
       <div class="row">
         @foreach($posts as $post)
         <div class="col-md-3 plus">
           <div class="mix {{$post->category->name}}">
             <a href="/posts/{{$post->id}}"><h4>{{$post->name}}</h4>
             @if($post->image)
             <img src="{{'storage/'
             .$post->image}}">
             @endif
             </a>
             <a class="m-a a-mydesign" href="/posts/{{$post->id}}">  view more </a>
             @if(isset(Auth::user()->id) && Auth::user()->id == 1)
             <a class="m-a a-mydesign" href="/allPosts/{{$post->id}}/edit"> || edit ||</a>
             <a  class="m-a a-mydesign" href="/allPosts/{{$post->id}}/delete"> delete </a>
             @endif
           </div>
         </div>
             @endforeach
       </div>
     </section>
     <!-- End my courses -->

  <!-- START ALL courses SECTION-->
  <div class="main-recipes my-design">
    <div class="container">
      <h1 class="text-center">top teachers</h1>
        <div class="row">
          @foreach($users as $user)
          <div class="col-md-3 plus">
            <div class="">
              @if($user->profile->image)
              <img src="{{'storage/'
              .$user->profile->image}}">
              @endif
              <a href="/users/{{$user->id}}/profile"><h4>{{$user->name}}</h4>

              <p >{{$user->about}}</p>
              <a href="/users/{{$user->id}}/profile" class="m-a a-mydesign" role="button">read more</a>
              @if(isset(Auth::user()->id) && Auth::user()->id == 1)
              <a class="m-a a-mydesign" href="/allPosts/{{$post->id}}/edit"> || edit ||</a>
              <a  class="m-a a-mydesign" href="/allPosts/{{$post->id}}/delete"> delete </a>
              @endif
            </div>
          </div>
              @endforeach
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <!-- END ALL courses  -->
    </div>
</div>
@endsection
@section('foot')
<!-- START FOOTER -->
<footer class="van ">
  <div class="container">
    <section >
      <span class=" text-center">copyright &copy; 2020 by samar mahfouz </span>
    </section>
  </div>
</footer>
<!-- END FOOTER -->
@endsection
@section('scripts')
    <script src="{{ asset('js/jquery.js') }}" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script  src="{{asset('js/mixitup.min.js')}}"></script>
    <script src="{{ asset('js/custom.js') }}" ></script>
  @endsection
