@extends('layouts.app')
@section('content')
<div class="settings">
  <div class="article settings">
    <div class="signup">
      <div class="container">

          <div class="contentform col-md-8 col-xs-12 updated-form">
            <h4>Update your info</h4>

              <form method="POST" action="{{ route('users.update', $user->id) }} "  enctype="multipart/form-data" >
                  @csrf
                  <div class="form-group">
                    <input id="name" type="text"  placeholder="Name (5 letter at least)" class=" plur-me form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
                    <i class="fa  fa-check-circle"></i>
                    <span class="alerts">* Name must be larger than 5 letters</span>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input id="name" type="text"  placeholder="Write your full name" class=" plur-me form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ $profile->fullname }}" >
                    <i class="fa  fa-check-circle"></i>
                    <span class="alerts">* Name must be larger than 7 letters</span>
                    @error('fullname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input id="FB" type="text"  placeholder="Write your facebook account" class=" plur-me form-control @error('FB') is-invalid @enderror" name="FB" value="{{ $profile->FB }}" >
                    <i class="fa  fa-check-circle"></i>
                    <span class="alerts">* write your right one</span>
                    @error('FB')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input id="LN" type="text"  placeholder="Write your Linked in account" class=" plur-me form-control @error('LN') is-invalid @enderror" name="LN" value="{{ $profile->LN }}" >
                    <i class="fa  fa-check-circle"></i>
                    <span class="alerts">* write your right one</span>
                    @error('LN')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input id="BH" type="text"  placeholder="Write your behance account" class=" plur-me form-control @error('BH') is-invalid @enderror" name="BH" value="{{ $profile->BH }}" >
                    <i class="fa  fa-check-circle"></i>
                    <span class="alerts">* write your right one</span>
                    @error('BH')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <input id="TW" type="text"  placeholder="Write your Twitter account" class=" plur-me form-control @error('TW') is-invalid @enderror" name="TW" value="{{ $profile->TW }}" >
                    <i class="fa  fa-check-circle"></i>
                    <span class="alerts">* write your right one</span>
                    @error('TW')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="catN">image</label>
                    <img src="{{$user->hasImage() ? asset('storage/'
                    .$user->getImage()): $user->getGravatar()}}" alt="" style="width:50px; height:50px">
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                           id="catN" >
                           @error('image')
                              <p class="red">{{$message}}</p>
                            @enderror
                  </div>
                  <div class="form-group">
                    <input id="name" type="text"  placeholder="Write your country" class=" plur-me form-control @error('country') is-invalid @enderror" name="country" value="{{ $profile->country }}" >
                    <i class="fa  fa-check-circle"></i>
                    <span class="alerts">*write your  country </span>
                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="info">write your biography</label>

                    <textarea id="info"  class=" plur-me form-control @error('info') is-invalid @enderror" name="info"" >
                      {{ Auth::user()->fullname }}
                    </textarea>
                    <i class="fa  fa-check-circle"></i>
                    <span class="alerts">* should be letters or numbers </span>
                    @error('info')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="myfav">write the things you love.</label>

                    <textarea id="myfav"  class=" plur-me form-control @error('myfav') is-invalid @enderror" name="myfav" >
                      {{ Auth::user()->fullname }}
                    </textarea>
                    <i class="fa  fa-check-circle"></i>
                    <span class="alerts">* should be letters or numbers </span>
                    @error('myfav')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group ">
                          <input id="password" type="password" placeholder="Password (8 letter at least)" class="password form-control @error('password') is-invalid @enderror" name="password">
                          <span class="alerts">* Weak password.</span>
                          <span class="show">Show password</span>
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                  </div>
                  <div class="form-group ">
                      <input id="email"  placeholder="email" type="email" class=" emails form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">
                      <i class="fa  fa-check-circle"></i>
                      <span class="alerts">* Email is not valid.</span>


                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group  ">
                    <button type="submit" value="Create your brand" class="btn btn-success btn sm" >
                        Update
                    </button>
                  </div>
              </form>
            </div>
      </div>
    </div>
  </div>
</div>
@endsection
