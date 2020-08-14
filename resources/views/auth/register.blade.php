@extends('layouts.app')

@section('content')
<div class="signup">

  <div class="container">
      <div class="row">
        <div class="imageform col-md-6">
          <img src="upload/header2.jpeg" alt="imageform" class="float-right img-responsiveidth" >
        </div>
          <div class="contentform col-md-6 col-xs-12">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h4>Start learning or teaching in four steps.</h4>
                <div class="form-group">
                  <input id="name" type="text"  placeholder="Name (5 letter at least)" class=" plur-me form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  <i class="fa  fa-check-circle"></i>
                  <span class="alerts">* Name must be larger than 5 letters</span>
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group ">
                        <input id="password" type="password" placeholder="Password (8 letter at least)" class="password form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <span class="show">Show password</span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat password">
                </div>
                <div class="form-group ">
                    <input id="email"  placeholder="Write a valid Email" type="email" class=" emails form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                      {{ __('Register') }}
                  </button>
                  <p class="pull-right">Already have an account | <a href="{{ route('login') }}"> Login</a></p>
                </div>
            </form>
          </div>
      </div>
  </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/jquery.js') }}" ></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="{{ asset('js/custom.js') }}" ></script>

  @endsection
