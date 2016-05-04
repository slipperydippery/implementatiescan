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
	<a href="">add participants</a>


	</div>
</div>



@stop



