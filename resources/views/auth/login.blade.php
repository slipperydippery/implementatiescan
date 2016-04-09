@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="large-12 title-img">
            {!! HTML::image('/img/loginlogo.jpg') !!}
        </div>
    </div>
    <div class="row">
        <div class = "large-4 loginform">
            <h2>Log in</h2>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}

                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="gebruikersnaam">

                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <input type="password" class="form-control" name="password" placeholder="wachtwoord">
                    </div>
                </div>

                <div class="form-group">
                    <div class="rememberme">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="">
                        <a href="{{ url('/password/reset') }}" class="login-info password-reset">Wachtwoord vergeten?</a>
                        <button type="submit" class="btn btn-primary">
                            <i class=""></i>Log in
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
