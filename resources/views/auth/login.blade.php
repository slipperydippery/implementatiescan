@extends('layouts.master')

@section('content')
<div class="row page-heading">
    <div class="large-12 ">
        <h1>Inloggen</h1>
        <fieldset class="fieldset large-8">
        <legend>Welkom bij de Implementatiescan</legend>
            <p >
              Om deel te kunnen nemen aan de implementatiescan heeft u inlogcodes ontvangen. Log hier in om toegang te krijgen tot de scan. Veel plezier!
                
            </p>
        </fieldset>
    </div>
</div>
<div class="row page-content loginform">
    <div class = "large-4">
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
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email adres">

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
@endsection
