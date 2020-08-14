@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">tags page</div>

                <div class="card-body">
                  <button type="button" class="btn btn-success"><a href="{{route('tags.create')}}">create tag</a></button>
                  @if(session()->has('success'))
                  <p class="btn btn-success">
                    {{session()->get('success')}}
                  </p>
                  @endif
                    @foreach($tags as $tag)
                      {{$tag -> name}}  <a href="{{route('tags.edit', $tag->id)}}">edit</a> ||
                      <form method="POST" action="{{ route('tags.destroy', $tag->id)}}">

                          @csrf
                             @method('DELETE')
                         <button class="btn-danger btn sm">delete</button>
                         <br>
                       </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
