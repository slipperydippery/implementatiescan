@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Kennismaken</h1>
		<fieldset class="fieldset">
  			<legend>Even voorstellen</legend>
			<p class=subheading>
				Vaak zal niet iedereen elkaar kennen. Daarom een voorstelrondje, waarbij iedereen aangeeft: wie ben je? namens welke organisatie, je rol/functie en wat je hoopt dat uit deze sessie komt (wens of droom).<br><br>
				Hieronder kunt u zien wie is aangemeld. Klopt dit 
			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">
	
	<div class="large-12 columns submitted-users">
		<h4>Aangemeldde Deelnemers: </h4>

		<div class="large-2 column submitted-user">
		<img src="{{asset('img/user_dark.png')}}"> <br><br>
			<span class="first">Gerrit</span> 
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
			<span class="close_submitted_user">x</span>
		</div>
		<div class="large-2 column submitted-user">
			<img src="{{asset('img/user.png')}}"> <br><br>
			<span class="first">Gerrit</span> 
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
			<span class="close_submitted_user">x</span>
		</div>
		<div class="large-2 column end submitted-user">
			<img src="{{asset('img/user.png')}}"> <br><br>
			<span class="first">Gerrit</span>
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
			<span class="close_submitted_user">x</span>
		</div>
		<div class="large-2 column submitted-user">
			<img src="{{asset('img/user.png')}}"> <br><br>
			<span class="first">Gerrit</span> 
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
			<span class="close_submitted_user">x</span>
		</div>
		<div class="large-2 column end submitted-user">
			<img src="{{asset('img/user.png')}}"> <br><br>
			<span class="first">Gerrit</span>
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
			<span class="close_submitted_user">x</span>
		</div>
		<div class="large-2 column submitted-user">
			<img src="{{asset('img/user.png')}}"> <br><br>
			<span class="first">Gerrit</span> 
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
			<span class="close_submitted_user">x</span>
		</div>
		<div class="large-2 column end submitted-user">
			<img src="{{asset('img/user.png')}}"> <br><br>
			<span class="first">Gerrit</span>
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
			<span class="close_submitted_user">x</span>
		</div>
		<div class="large-2 column submitted-user">
			<img src="{{asset('img/user.png')}}"> <br><br>
			<span class="first">Gerrit</span> 
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
			<span class="close_submitted_user">x</span>
		</div>
		<div class="large-2 column end submitted-user">
			<img src="{{asset('img/user.png')}}"> <br><br>
			<span class="first">Gerrit</span>
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
			<span class="close_submitted_user">x</span>
		</div>
		<div class="large-2 column submitted-user">
			<img src="{{asset('img/user.png')}}"> <br><br>
			<span class="first">Gerrit</span> 
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
			<span class="close_submitted_user">x</span>
		</div>
		<div class="large-2 column end submitted-user">
			<span class="add_submitted_user">+</span>
		</div>

		
	</div>
</div>
@stop

@section('site-footer')
<div class="row ">
	<div class="large-4 column end page-next">	

		<a href="{{ URL::route('scans.algemeenbeeld', $scan) }}" class="button button-next">Scan Starten</a>
	</div>
</div>

@stop
