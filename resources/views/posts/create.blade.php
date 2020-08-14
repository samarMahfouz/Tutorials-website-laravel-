@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href=" {{asset('css/trix.css')}}">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{isset($post) ? 'update post' : 'create post'}}</div>

                <div class="card-body">
                  <form method="POST" enctype="multipart/form-data" action="{{isset($post) ? route('posts.update', $post->id) : route('posts.store')}}">

                    @csrf
                    @if(isset($post))
                       @method('PUT')
                    @endif
                    <div class="form-group">
                      <label for="catN">name</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                             id="catN" value="{{isset($post) ? $post->name : ''}}">
                             @error('name')
                                <p class="red">{{$message}}</p>
                              @enderror
                    </div>
                    <div class="form-group">
                      <label for="catN">description</label>
                      <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                             id="catN" value="{{isset($post) ? $post->description : ''}}">
                             @error('description')
                                <p class="red">{{$message}}</p>
                              @enderror
                    </div>
                    <div class="form-group">
                      <label >content</label>
                             <input id="x" type="hidden" name="content" name="content" class="form-control @error('content') is-invalid @enderror"
                            value="{{isset($post) ? $post->content : ''}}">
                              <trix-editor input="x"></trix-editor>
                             @error('content')
                                <p class="red">{{$message}}</p>
                              @enderror
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                      <label for="catN">image</label>
                      <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                             id="catN" >
                             @error('image')
                                <p class="red">{{$message}}</p>
                              @enderror
                    </div>
                    <div class="form-group">
                     <label for="exampleFormControlSelect1">categoriess</label>
                     <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                       <option>...</option>
                       @foreach($categories as $cat)
                       <option value="{{$cat->id}}">{{$cat->name}}</option>
                       @endforeach
                     </select>
                   </div>
                   <div class="form-group">
                     <input type="hidden" name="user_id" class="form-control @error('image') is-invalid @enderror" value="{{Auth::user()->id}}">

                  </div>
                   @if(!$tags->count() <= 0)
                     <div class="form-group">
                      <label for="tagid">select tags</label>
                      <select name="tags[]" class="form-control" id="tagid" multiple>
                        <option>...</option>
                        @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary">{{isset($post) ? 'update' : 'save'}}</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
@endsection
