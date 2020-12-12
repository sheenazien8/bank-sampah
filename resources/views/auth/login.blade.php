@extends('layouts.auth')

@section('content')
  <div class="card">
    <div class="card-header"><h4>Login</h4></div>
    <div class="card-body">
      <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
        @csrf
        <div class="form-group">
          <label for="identity">{{ trans('app.auth.username_or_pin') }}</label>
          <input id="identity" type="text" class="form-control {{ $errors->first('identity') ? 'is-invalid': '' }}" name="identity" tabindex="1"  autofocus>
          @error('identity')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group container-eye-icon">
          <div class="d-block">
            <label for="password" class="control-label"> {{ trans('app.auth.password') }} </label>
          </div>
          <input id="password" type="password" class="form-control {{ $errors->first('password') ? 'is-invalid': '' }}" name="password" tabindex="2" >
          <!-- An element to toggle between password visibility -->
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" tabindex="3" type="checkbox" id="show-password"onclick="myFunction()">
            <label class="custom-control-label" for="show-password">Show Password</label>
          </div>
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
            <label class="custom-control-label" for="remember-me">Remember Me</label>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
            Login
          </button>
        </div>
      </form>
    </div>
  </div>

@endsection
