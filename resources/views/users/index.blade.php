@extends('layouts.app')

@section('content')
<div class="container">
   <h1 class="text-center">All users</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if(session()->has('success'))
          <p class="btn btn-success deleyme">
            {{session()->get('success')}}
          </p>
          @endif
          <div class="panel panel-default">
              <table class="table">
                <thead>
                  <th>name</th>
                  <th>email</th>
                  <th>image</th>
                  <th>role</th>
                  <th>control</th>
                  <th></th>
                  <th></th>
                </thead>
                <tbody>
            @foreach($users as $user)
            <tr>
              <td><a href="{{route('users.profile', $user->id)}}">{{$user->name}}</td>
              <td>{{$user -> email}}</td>
              <td><img src="{{$user->getGravatar()}}" alt=""
                style="width:50px; height:50px"></td>
              <td>
                {{$user -> role}}
                @if(!$user->isAdmin())
              <form method="POST" action="{{route('users.make-admin', $user->id)}}">
                    @csrf
                   <button class="btn-success btn sm" type="submit">make admin</button>
                   <br>
                 </form>
                 @endif
              </td>

              <td>
              <a href="{{route('users.edit', $user->id)}}"  class="btn-primary btn sm ">edit</a>
            </td>
            <td>
              <form method="POST" action="{{route('users.delete', $user->id)}}">

                  @csrf

                 <button class="btn-danger btn sm">delete</button>
                 <br>
               </form>
               </td>
               <td>
                 @if($user->isAdmin())
               <form method="POST" action="{{route('users.make-admin', $user->id)}}">
                     @csrf
                    <button class="btn-success btn sm" type="submit">cancel admin</button>
                    <br>
                  </form>
                  @endif
               </td>
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
@section('scripts')
<script src="{{ asset('js/jquery.js') }}" ></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ asset('js/custom.js') }}" ></script>

  @endsection
