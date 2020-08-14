@extends('layouts.app')

@section('content')
<div class="container">
  <button type="button" class=" btn btn-success float-right"><a href="{{route('posts.create')}}">create post</a></button>
   <h1 class="text-center">your posts</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if(session()->has('success'))
          <p class="btn btn-success deleyme">
            {{session()->get('success')}}
          </p>
          @endif
          @if($posts->isNotEmpty())
          <div class="panel panel-default">
              <table class="table">
                <thead>
                  <th>name</th>
                  <th>description</th>
                  <th>image</th>
                  <th>control</th>
                  <th></th>
                </thead>
                <tbody>
            @foreach($posts as $post)
            <tr>
              <td>{{$post -> name}}</td>
              <td>{{$post -> description}}</td>
              <td><img src="{{'../../storage/'
              .$post->image}}" alt="" style="width:100px; height:100px;"></td>
              <td>
              @if(!$post->trashed())
              <a href="{{route('posts.edit', $post->id)}}"  class="btn-primary btn sm ">edit</a>

              @endif
            </td>
            <td>
              <form method="POST" action="{{ route('posts.destroy', $post->id)}}">

                  @csrf
                     @method('DELETE')
                 <button class="btn-danger btn sm">{{$post->trashed() ? 'Delete' : 'Trash'}}</button>
                 <br>
               </form>
               </td>
            @endforeach
          </tbody>
        </table>
      </div>
      @else
      no posts to show
      @endif
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
