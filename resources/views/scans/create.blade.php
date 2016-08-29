@extends('layouts.admin')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Maak een nieuwe scan aan</h1>
		<fieldset class="fieldset">
  			<p class="subheading subheading__time">
  				Als administrator kunt u hier nieuwe scans aanmaken zodat scholen een sessie kunnen organiseren. Met het aanmaken van de scan kiest u een voorzitter die verantwoordelijk is voor het inrichten van de scan. De voorzitter krijgt een eigen inlogcode waarmee hij of zij deelnemers kan uitnodigen.  

  			</p>

		</fieldset>
	</div>
</div>


<div class="row page-content">
	
	<div class="large-8 columns submitted-users">
	
		{!! Form::open(['route' => 'scans.store']) !!}
			@include('scans.partials.form', ['submittext' => 'Maak scan aan'])
		{!! Form::close() !!}

	</div>
</div>

@stop

@section('additional-scripts')
    <script src="{{ URL::asset('js/pikaday.js') }}"></script>
    <script>

    var picker = new Pikaday(
    {
        field: document.getElementById('datepicker'),
        firstDay: 1,
        format: 'D MMM YY',
        minDate: new Date(2000, 0, 1),
        maxDate: new Date(2020, 12, 31),
        yearRange: [2000,2020]
    });

    </script>

    <template id="acties-template">
    	<div class="row" v-for="thema in themas">
    		@{{ thema.title }}
    		@{{ thema.id }}
    		<actie></actie>
    	</div>
    </template>
    <template id="actie-template">
    	
    </template>

@stop

@section('site-footer')

@stop