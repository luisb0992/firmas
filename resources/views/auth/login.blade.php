@extends('layouts.login')

@section('content')
<div class="limiter">
  <div class="container-login100" style="background-image: url('login/images/bg-01.jpg');">
    <div class="wrap-login100">
      @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        	<ul>
             @foreach($errors->all() as $error)
                <li>{{$error}}</li>
             @endforeach
         	</ul>
        </div>
      @endif
      <form class="login100-form validate-form" method="POST" action="{{ route('entrar') }}">
        @csrf
        <span class="login100-form-logo">
          <i class="fa fa-user"></i>
        </span>

        <span class="login100-form-title p-b-34 p-t-27">
          Log in
        </span>

        <div class="wrap-input100 validate-input" data-validate = "Enter username">
          <input id="user" class="input100 {{ $errors->has('user') ? ' is-invalid' : '' }}" type="text" name="user" placeholder="Usuario" value="{{ old('user') }}" required autofocus>
          <span class="focus-input100" data-placeholder="&#xf207;"></span>

          @if ($errors->has('user'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('user') }}</strong>
              </span>
          @endif
        </div>

        <div class="wrap-input100 validate-input" data-validate="Enter password">
          <input class="input100 {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Password" id="password" name="password" required>
          <span class="focus-input100" data-placeholder="&#xf191;"></span>
          @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>

        <div class="container-login100-form-btn">
          <button class="login100-form-btn" type="submit">
            Login
          </button>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection
