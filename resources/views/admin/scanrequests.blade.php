@extends('layouts.admin', ['title' => 'overzicht scans'])

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Overzicht Scansaanvragen</h1>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				Hier is een overzicht van alle scan aanvragen
  			</p>
		</fieldset>
	</div>
</div>



<div class="row page-content">
	
	<div class="large-12 columns table">
	
			<div class="row table-row table-header">
				<div class="small-2 columns">
					School
				</div>
				<div class="small-2 columns">
					Regio
				</div>
				<div class="small-2 columns">
					Beheerder
				</div>
				<div class="small-3 columns">
					Email
				</div>
				<div class="small-1 columns">
					Instantie
				</div>
				<div class="small-1 columns">
					Testscan
				</div>
				<div class="small-1 columns">
					Datum
				</div>
				
			</div>
		

		@foreach($scanrequests as $scanrequest)
			<div class="row table-row">
				<div class="small-2 columns">
					{{ $scanrequest->title }}
				</div>
				<div class="small-2 columns">
					{{ $scanrequest->regio }}
				</div>
				<div class="small-2 columns">
					{{ $scanrequest->beheerder_name_first }} {{ $scanrequest->beheerder_name_last }}
				</div>
				<div class="small-3 columns">
					{{ $scanrequest->beheerder_email }}
				</div>
				<div class="small-1 columns">
					{{ $scanrequest->beheerder_instantie }}
				</div>
				<div class="small-1 columns">
					{{ $scanrequest->testscan }}
				</div>
				<div class="small-1 columns">
					{{ $scanrequest->created_at->format('d-m-y') }}
				</div>
			</div>
			    
		@endforeach

	</div>

	<a href=" {{ route('scans.create') }} " class="button">Maak een nieuwe scan aan</a>

</div>

@stop


