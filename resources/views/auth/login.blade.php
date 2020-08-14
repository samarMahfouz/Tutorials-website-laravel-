@extends('layouts.app')

@section('content')
<!-- START LOGIN FORM -->
  <div class="login">
      <div class="container">
        <div class="row">
          <div class="imageform col-md-6">
            <img src="upload/header2.jpeg" alt="imageform" class="float-right img-responsiveidth " >
          </div>
            <div class="contentform col-md-6 col-xs-12">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h4>welcome back, have a good day.</h4>
                            <div class="form-group ">
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror  emails" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                               <i class="fa fa-check-circle"></i>
                               <span class="alerts">* Email not valid.</span>
                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                            <div class="form-group ">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>

                            <div class="form-group rememberstyle">
                              <input class="float-left" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                              <label class="float-left" for="remember">
                                  {{ __('Remember Me') }}
                              </label>
                              <div class="clearfix"></div>
                            </div>

                            <div class="form-group">
                              <button type="submit" value="Login" class="btn btn-success float-left" >
                                  {{ __('Login') }}
                              </button>

                              @if (Route::has('password.request'))
                                  <a class="btn btn-link float-left" href="{{ route('password.request') }}">
                                      {{ __('Forgot Password?') }}
                                  </a>
                              @endif
                              <p class="float-right">Need an account | <a href="{{ route('register') }}"> Sign up</a></p>
                              <div class="clear"></div>
                            </div>
                        </form>
            </div>
        </div>
    </div>
  </div>
@endsection
