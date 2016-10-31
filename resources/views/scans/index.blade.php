@extends('layouts.admin', ['title' => 'overzicht scans'])

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
	<div class="small-12 columns">
		<div class="row">
			<a href="{{ URL::route('admin.scanrequests') }}">
				<div class="small-2 columns">
					# Inlog aanvragen: 
				</div>
				<div class="small-10 columns">
					{{ $scanrequests->count() }}
				</div>
			</a>
		</div>
		<div class="row">
			<a href="{{ URL::route('users.index') }}">
				<div class="small-2 columns">
					# Inlogs: 
				</div>
				<div class="small-10 columns">
					{{ $users->sum('logincount') }}
				</div>
			</a>
		</div>
		<div class="row">
			<div class="small-2 columns">
				# Deel 1 afgerond: 
			</div>
			<div class="small-10 columns">
				{{ $scans->sum('deeleencomplete') }}
			</div>
		</div>
		<div class="row">
			<div class="small-2 columns">
				# Deel 2 afgerond: 
			</div>
			<div class="small-10 columns">
				{{ $scans->sum('deeltweecomplete') }}
			</div>
		</div>
	</div>
</div>
<div class="row page-content">
	
	<div class="large-12 columns table">
	
			<div class="row table-row table-header">
				<div class="small-3 columns">
					School
				</div>
				<div class="small-2 columns">
					Beheerder
				</div>
				<div class="small-1 columns">
					Deelnmrs
				</div>
				<div class="small-2 columns">
					Datum
				</div>
				<div class="small-1 columns">
					Deel 1
				</div>
				<div class="small-1 columns">
					Deel 2
				</div>
				<div class="small-1 columns">
					Test
				</div>
				<div class="small-1 columns">
					Admin
				</div>
				
			</div>
		

		@foreach($scans as $scan)
			<div class="row table-row">
				<div class="small-3 columns">
					<a href=" {{ URL::route('scans.edit', $scan) }} ">
						{{ $scan->title }} - {{ $scan->regio }}
					</a>
				</div>
				<div class="small-2 columns">
					{{ $scan->beheerder->name_first }} {{ $scan->beheerder->name_last }}
				</div>
				<div class="small-1 columns">
					{{ count($scan->participants) }}
				</div>
				<div class="small-2 columns">
					{{ $scan->datedeeleen }}
				</div>
				<div class="small-1 columns">
					{{ $scan->deeleencomplete }}
				</div>
				<div class="small-1 columns">
					{{ $scan->deeltweecomplete}}
				</div>
				<div class="small-1 columns">
					{{ $scan->testscan }}
				</div>
				<div class="small-1 columns">

					<a href=" {{ URL::route('scans.edit', $scan) }} ">Edit</a> -
					<a href=" {{ URL::route('scans.delete', $scan) }} ">
						Del
					</a>
				</div>

			</div>
			    
		@endforeach

	</div>

	<a href=" {{ route('scans.create') }} " class="button">Maak een nieuwe scan aan</a>

</div>

@stop


