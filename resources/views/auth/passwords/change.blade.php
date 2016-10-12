@extends('layouts.master', ['title' => 'reset wachtwoord'])

@section('content')
<div class="row page-heading">
    <div class="small-12 ">
        <h1>Verander uw wachtwoord</h1>
        <fieldset class="fieldset small-8">
        <legend>Een nieuwe kans</legend>
            <p >
                Vul hieronder een nieuw wachtwoord in. Bedenk bij voorkeur een wachtwoord dat meer dan 8 tekens bevat en dat voor u makkelijk te onthouden is. 
            </p>
        </fieldset>
    </div>
</div>


<div class="row page-content loginform">
    <div class="small-4">
        <h2>Nieuw Wachtwoord</h2>
        @if ($errors->any())
          <div class="alert callout" data-closable>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }} </li>
              @endforeach
            </ul>
            <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        @endif

        {!! Form::open(['route' => ['users.changepassword', Auth::user()]]) !!}

            <!-- wachtwoord Form Input -->
            <div class="form-group">
                {!! Form::label('password', 'wachtwoord:') !!}
                {!! Form::password('password', null, ['class' => 'form-control']) !!}
            </div>

            <!-- bevestig wachtwoord Form Input -->
            <div class="form-group">
                {!! Form::label('password_confirmation', 'bevestig wachtwoord:') !!}
                {!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Add Submit Field -->
            <div class="form-group">
                {!! Form::submit('Verander Wachtwoord', ['class' => 'button form-control']) !!}
            </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
