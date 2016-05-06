@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>{{ $scan->title }} </h1>
		<fieldset class="fieldset">
  			<legend></legend>
  			<p class="subheading subheading__time">
  				bla

  			</p>

		</fieldset>
	</div>
</div>



<div class="row page-content">
	<div class="large-12 columns">
	beheerder: <br>
	{{ $scan->beheerder->email }} <br>
	participants: <br>
	@foreach($scan->participants as $participant)	
		{{ $participant->email }}
	@endforeach
	<h4><a href="">add participants</a></h4>
	@foreach($users as $user)
		@if(count($scan->participants->intersect([$user])) < 1)
			{!! Form::open(['route' => ['scans.addparticipant', $scan]]) !!}
				<!-- Hidden userid Type Form Input -->
				{!! Form::hidden('user_id', $user->id, null) !!}
			
				{{ $user->name_first }} {{ $user->name_last }} {{ $user->email }} <button onClick="this.form.submit()" class="button">Voeg toe</button>

			{!! Form::close() !!}
		@endif
	@endforeach


	</div>
</div>



@stop



