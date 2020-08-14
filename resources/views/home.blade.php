@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <div >
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif
              <!-- START PROFILE FRIST SECTION-->
              <div class="pro-first-sec">
                    <div class="prof-img">
                      <div class="overlay"></div>
                      <img src="{{'storage/'.$profile->image}}">
                      <div class="prof-info">
                        <div class="row">
                          <p class="sec col-md-12">Chef : {{ Auth::user()->name }}</p>
                          <p class="sec col-md-12">{{ $profile->country }}</p>
                        </div>
                      </div>
                      <div class="prof-con">
                        <div class="row">
                          <div class="sec col-xs-4">
                            <span>0</span> <span>followers</span>
                          </div>
                          <div class="sec col-xs-4">
                            <span>0</span> <span> following</span>
                          </div>
                          <div class="sec col-xs-4">
                            <span>0</span> <span> courses</span>
                          </div>
                        </div>
                        <div class="clearfix"></div>

                      </div>
                      <div class="social-icons">
                        <span><a href="https://{{ $profile->FB }}"><i class="fa fa-facebook"></a></i></span>
                        <span><a href="https://{{ $profile->TW }}"><i class="fa fa-twitter"></a></i></span>
                        <span><a href="https://{{ $profile->BH }}"><i class="fa fa-behance"></a></i></span>
                        <span><a href="https://{{ $profile->LN }}"><i class="fa fa-linkedin"></a></i></span>

                      </div>

                    </div>
                </div>

                <!-- END PROFILE FRIST SECTION-->
                <!-- START PROFILE SECOND SECTION-->
                <div class="pro-second-sec">
                    <div class="row">
                      <div class="col-xs-12 col-md-2 ">
                        <ul class="nav  links nav-pills tabs-list  d-block d-sm-none">
                          <li data-class=".about" role="presentation" class="  fs12"><a href="#">Home</a></li>
                          <li data-class=".courses" role="presentation" class="fs12"><a href="#">courses</a></li>
                          <li  role="presentation" class="fs12"><a href="{{route('users.edit', Auth::user()->id)}}">settings</a></li>
                          <li  role="presentation" class="fs12"><a href="/posts">all posts</a></li>
                          <li role="presentation" class="fs12">  <a href="{{route('posts.create')}}">create post</a>  </li>
                          <li role="presentation" class="fs12">  <a href="{{route('categories.create')}}">create category</a>  </li>
                        </ul>
                        <ul class="nav links nav-pills nav-stacked tabs-list d-none d-sm-block" >
                          <li  role="presentation" data-class=".about"><a href="#">about me</a></li>
                          <li class=""role="presentation" data-class=".courses"><a href="#">courses</a></li>
                          <li role="presentation"  ><a href="{{route('users.edit', Auth::user()->id)}}">settings</a></li>
                          <li  role="presentation" class="fs12"><a href="/posts">all posts</a></li>
                          <li role="presentation" class="fs12">  <a href="{{route('posts.create')}}">create post</a>  </li>
                          <li role="presentation" class="fs12">  <a href="{{route('categories.create')}}">create category</a>  </li>

                        </ul>
                      </div>
                      <div class="content-list col-xs-12 col-md-10">
                          <div class=" about col-xs-12 col-md-10 hide  toggles">
                            <div class="article">
                              @if(!is_null($profile->info) )
                              <h4 class="skills">about me</h4>
                              <p>{{ $profile->info }}</p>
                              @endif
                              @if(!is_null($profile->myfav) )
                                <h4 class="skills">my favorites</h4>
                                <p>{{ $profile->myfav }}</p>
                              @endif
                              @if(is_null($profile->info) && is_null($profile->myfav))
                              <p class="btn btn-info">Nothing to show</p>
                              @endif
                            </div>
                        </div>
                        <div class=" courses col-xs-12 col-md-10 toggles">
                          @if($posts->isNotEmpty())
                          <div class="first-section">
                          <h1 class="text-center">most popular</h1>
                          <div class="row">
                            @foreach($posts as $post)
                            <div class="article col-sm-6  t-c ">
                              <div class="row">
                                <div class="image col-md-4 images">
                                  <img class="image" src="{{'storage/'
                                  .$post->image}}">
                                </div>
                                <div class="article-content col-md-8">
                                  <h3>{{$post->name}}</h3>
                                  <p>{{$post->description}}</p>
                                  <a href="/posts/{{$post->id}}">read more</a>

                                </div>
                              </div>

                            </div>
                            @endforeach

                            <div class="clearfix"></div>
                          </div>
                          <a href="/allposts" class=" btn btn-primary btn-sm pull-right last-a"> more courses</a>
                          </div>
                          <div class="secound-section">
                            <!-- START PROFILE THIRD SECTION-->
                            <div class="pro-third-sec">
                                <h2 class="text-center">latest courses</h2>
                                    <div class="row">
                                      @if($posts->isNotEmpty())
                                        @foreach($posts as $post)
                                       <a href="/posts/{{$post->id}}" class="col-sm-6  col-md-4 ">
                                        <div class="article t-c ">
                                              <img class="image" src="{{'storage/'
                                              .$post->image}}">
                                        </div>
                                      </a>
                                        @endforeach
                                        <div class="clearfix"></div>
                                      </div>
                            <a href="/allposts" class="text-center btn btn-primary btn-sm pull-right last-a">show more courses</a>
                            @else
                            <p class="btn btn-info">No posts to show</p>
                            @endif
                        </div>
                          </div>
                          @else
                          <p class="btn btn-info">No posts to show</p>
                          @endif
                        </div>

                      </div>
                      <div class="clearfix"></div>

                    </div>
                </div>
              </div>
                <!-- END PROFILE SECOND SECTION-->

            </div>
        </div>
    </div>
</div>
@endsection
@section('foot')
<!-- START FOOTER -->
<footer class="van fixed-bottom">
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
    <script src="{{ asset('js/custom.js') }}" ></script>
@endsection
