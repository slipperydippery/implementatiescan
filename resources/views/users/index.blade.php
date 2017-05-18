@extends('layouts.admin', ['title' => 'overzicht gebruikers'])

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Overzicht Gebruikers</h1>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				Hier is een overzicht van all uw gebruikers

  			</p>

		</fieldset>
	</div>
</div>


<div class="row page-content">
	
	<div class="large-12 columns submitted-users">

			<div class="row table-row table-header">
				<div class="small-2 columns">
					id en Voornaam
				</div>
				<div class="small-2 columns">
					Achternaam
				</div>
				<div class="small-3 columns">
					Email
				</div>
				<div class="small-2 columns">
					Beheert
				</div>
				<div class="small-2 columns">
					Participeert
				</div>
				<div class="small-1 columns">
					Logins
				</div>
				
			</div>
		@foreach($users as $user)
			<div class="row table-row">
				<div class="small-2 columns">
					{{ $user->id }}
					<a href=" {{ route('users.show', $user->id) }} ">{{ $user->name_first }}</a>
				</div>
				<div class="small-2 columns">
					<a href=" {{ route('users.show', $user->id) }} ">{{ $user->name_last }}</a>
				</div>
				<div class="small-3 columns">
					<a href=" {{ route('users.show', $user->id) }} ">{{ $user->email }}</a>
				</div>
				<div class="small-2 columns">
					@if(!count($user->beheert))
						-
					@endif
					@foreach($user->beheert as $beheerscan)
						{{ $beheerscan->title }}
					@endforeach
				</div>
				<div class="small-2 columns">
					@if(!count($user->scans))
						-
					@endif
					@foreach($user->scans as $participeerscan)
						{{ $participeerscan->title }} <br>
					@endforeach
				</div>
				<div class="small-1 columns">
					{{ $user->logincount }}
				</div>

			</div>


			    
		@endforeach
		<br>

	</div>
	<div class="large-12">

		<a href=" {{ route('users.create') }} " class="button">Maak een gebruiker aan</a>
	</div>
</div>

@stop


