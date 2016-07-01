@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Overzicht Themas</h1>
		<fieldset class="fieldset">
  			<legend></legend>
  			<p class="subheading subheading__time">
  				Hier is een overzicht van all uw themas

  			</p>

		</fieldset>
	</div>
</div>


<div class="row page-content">
	
	<div class="large-12 columns submitted-users">
	
		@foreach($themas as $thema)
			<a href=" {{ route('themas.show', $thema->id) }} "><h2>{{ $thema->title }}</h2></a> 
			<a href=" {{ URL::to('themas/' . $thema->id . '/video') }} ">edit video</a> <br><br><br>
			    
		@endforeach

		<a href=" {{ route('themas.create') }} " class="button">Create new Thema</a>

	</div>
</div>

@stop



@section('site-footer')
<div class="row ">
	<div class="large-4 column end page-next">	

		<a href="{{ URL::to('algemeenbeeld') }}" class="button button-next">Scan Starten</a>
	</div>
</div>

@stop


