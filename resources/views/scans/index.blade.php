@extends('layouts.admin')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Overzicht Scans</h1>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				Hier is een overzicht van all uw scans
  			</p>
		</fieldset>
	</div>
</div>


<div class="row page-content">
	
	<div class="large-12 columns table">
	
			<div class="row table-row table-header">
				<div class="small-3 columns">
					School
				</div>
				<div class="small-2 columns">
					Regio
				</div>
				<div class="small-2 columns">
					Beheerder
				</div>
				<div class="small-2 columns">
					Deelnemers
				</div>
				<div class="small-2 columns">
					Datum
				</div>
				<div class="small-1 columns">
					Edit
				</div>
				
			</div>
		

		@foreach($scans as $scan)
			<div class="row table-row">
				<div class="small-3 columns">
					<a href=" {{ URL::route('scans.invoerendeelnemers', $scan) }} ">{{ $scan->title }}</a>
				</div>
				<div class="small-2 columns">
					{{ $scan->regio }}
				</div>
				<div class="small-2 columns">
					{{ $scan->beheerder->name_first }} {{ $scan->beheerder->name_last }}
				</div>
				<div class="small-2 columns">
					{{ count($scan->participants) }}
				</div>
				<div class="small-2 columns">
					--
				</div>
				<div class="small-1 columns">
					<a href=" {{ URL::route('scans.edit', $scan) }} ">
						edit
					</a>
				</div>

			</div>
			    
		@endforeach

	</div>

	<a href=" {{ route('scans.create') }} " class="button">Maak een nieuwe scan aan</a>

</div>

@stop


