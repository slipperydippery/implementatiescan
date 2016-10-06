@extends('layouts.master', ['title' => 'wachtwoord vergeten'])

@section('content')
<div class="row page-heading">
    <div class="large-12 ">
        <h1>Reset Wachtwoord</h1>
        <fieldset class="fieldset large-8">
        <legend>Wachtwoord vergeten?</legend>
            <p >
                Bent u uw wachtwoord vergeten? Hier kunt u uw wachtwoord resettten. Vul hieronder uw email adress in, en u krijgt een mail toegestuurd met daarin een link om zelf een nieuw wachtwoord in te stellen.
            </p>
        </fieldset>
    </div>
</div>

<div class="row loginform">
    <div class = "large-4">
        <h2>Reset Password</h2>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                <div class="col-md-6">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email adres">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-envelope"></i>Verstuur wachtwoord reset link
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
