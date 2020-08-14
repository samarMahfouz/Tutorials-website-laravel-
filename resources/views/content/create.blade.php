@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{isset($category) ? 'update category' : 'create category'}}</div>

                <div class="card-body">
                  <form method="POST" action="{{isset($category) ? route('categories.update', $category->id) : route('categories.store')}}">

                    @csrf
                    @if(isset($category))
                       @method('PUT')
                    @endif

                    <div class="form-group">
                      <label for="catN">category name</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                             id="catN" value="{{isset($category) ? $category->name : ''}}">
                             @error('name')
                                <p class="red">{{$message}}</p>
                              @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{isset($category) ? 'update' : 'save'}}</button>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
