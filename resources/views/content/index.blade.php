@extends('layouts.app')

@section('content')
<div class="container">
  <button type="button" class="btn btn-success float-right"><a href="{{route('categories.create')}}">create category</a></button>

    <h1 class="text-center">All Categories</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if(session()->has('success'))
          <p class="btn btn-success">
            {{session()->get('success')}}
          </p>
          @endif
          <div class="panel panel-default">
              <table class="table">
                <thead>
                  <th>name</th>
                  <th>control</th>
                  <th></th>
                </thead>
                <tbody>
              @foreach($categories as $cat)
                <tr>
                  <td>{{$cat -> name}}</td>
                  <td>
                    <a href="{{route('categories.edit', $cat->id)}}" class="btn-primary btn sm ">edit</a>
                  </td>
                  <td>
                    <form method="POST" action="{{ route('categories.destroy', $cat->id)}}">

                      @csrf
                         @method('DELETE')
                     <button class="btn-danger btn sm">delete</button>
                     <br>
                   </form>
                 </td>
                </tr>


            @endforeach
            </tbody>
          </table>
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
