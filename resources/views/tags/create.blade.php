@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{isset($tag) ? 'update tag' : 'create tag'}}</div>

                <div class="card-body">
                  <form method="POST" action="{{isset($tag) ? route('tags.update', $tag->id) : route('tags.store')}}">

                    @csrf
                    @if(isset($tag))
                       @method('PUT')
                    @endif

                    <div class="form-group">
                      <label for="catN">tag name</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                             id="catN" value="{{isset($tag) ? $tag->name : ''}}">
                             @error('name')
                                <p class="red">{{$message}}</p>
                              @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{isset($tag) ? 'update' : 'save'}}</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
