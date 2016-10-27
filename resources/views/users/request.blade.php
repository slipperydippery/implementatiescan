@extends('layouts.master', ['title' => 'maak nieuwe scans'])

@section('content')
<div class="row page-heading">
	<div class="large-8 ">
		<h1>Account aanvragen</h1>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				Wilt u gezamenlijk met uw netwerkpartners een implementatiescan uitvoeren? Dan kunt u hier een account aanvragen. Vul uw gegevens in en wij maken een scan voor u aan. U ontvangt uw inloggevens per email.
  			</p>
		</fieldset>
	</div>
</div>


<div class="row page-content">
	
	<div class="large-8 columns submitted-users">
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
	
		{!! Form::open(['route' => 'users.sendrequest']) !!}
			@include('users.partials.requestform', ['submittext' => 'Vraag scan aan'])
		{!! Form::close() !!}

	</div>
</div>

@stop

@section('additional-scripts')



@stop

@section('site-footer')

@stop