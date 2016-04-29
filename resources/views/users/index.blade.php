@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Overzicht Gebruikers</h1>
		<fieldset class="fieldset">
  			<legend></legend>
  			<p class="subheading subheading__time">
  				Hier is een overzicht van all uw gebruikers

  			</p>

		</fieldset>
	</div>
</div>


<div class="row page-content">
	
	<div class="large-12 columns submitted-users">
		@can('manage_scans')
			hello bro
		@endcan

		@foreach($users as $user)

			<a href=" {{ route('users.show', $user->id) }} ">{{ $user->name_first }}</a>
			@foreach($user->roles as $role)
				- {{ $role->label }}
			@endforeach
			<br>
			    
		@endforeach
		<a href=" {{ route('users.create') }} " class="button">Create new User</a>

	</div>
</div>

@stop


