@extends('layouts.admin', ['title' => 'overzicht scans'])

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Overzicht Scans</h1>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				Hier is een overzicht van all uw scans. Bovenaan de pagina vindt u een aantal analyses van de scans. Onderaan de pagina kunt u de lijst van alle scans terugvinden. 
  			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">
	<div class="small-4 columns table">
		<div class="row table-row table-header">
			Overzicht Scans
		</div>
		<div class="row table-row">
			<a href="{{ URL::route('admin.scanrequests') }}">
				<div class="small-10 columns">
					Aanvragen: 
				</div>
				<div class="small-2 columns">
					{{ $scanrequests->count() }}
				</div>
			</a>
		</div>
		<div class="row table-row">
			<a href="{{ URL::route('users.index') }}">
				<div class="small-10 columns">
					Inlogs: 
				</div>
				<div class="small-2 columns">
					{{ $users->sum('logincount') }}
				</div>
			</a>
		</div>
		<div class="row table-row">
			<div class="small-10 columns">
				Deel 1 afgerond: 
			</div>
			<div class="small-2 columns">
				{{ $scans->sum('deeleencomplete') }}
			</div>
		</div>
		<div class="row table-row">
			<div class="small-10 columns">
				Deel 2 afgerond: 
			</div>
			<div class="small-2 columns">
				{{ $scans->sum('deeltweecomplete') }}
			</div>
		</div>
	</div>
</div>]

<div class="row page-content">
	<div class="small-12 columns">
		<deelnemersveld></deelnemersveld>
	</div>
</div>

<div class="row page-content">
	<div class="small-12 columns">
		<criteria></criteria>
	</div>
</div>

<div class="row page-content">
	<div class="large-12 columns">
		<scanlist></scanlist>
	</div>
	<a href=" {{ route('scans.create') }} " class="button">Maak een nieuwe scan aan</a>
</div>

@stop


