@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Met wie aan tafel</h1>
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
			{!! HTML::image('/img/user_dark.png') !!} <br><br>
			<span class="first">Gerrit</span> 
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
		</div>
		<div class="large-2 column submitted-user">
			{!! HTML::image('/img/user.png') !!} <br><br>
			<span class="first">Gerrit</span> 
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
		</div>
		<div class="large-2 column end submitted-user">
			{!! HTML::image('/img/user.png') !!} <br><br>
			<span class="first">Gerrit</span>
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
		</div>
		<div class="large-2 column submitted-user">
			{!! HTML::image('/img/user.png') !!} <br><br>
			<span class="first">Gerrit</span> 
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
		</div>
		<div class="large-2 column end submitted-user">
			{!! HTML::image('/img/user.png') !!} <br><br>
			<span class="first">Gerrit</span>
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
		</div>
		<div class="large-2 column submitted-user">
			{!! HTML::image('/img/user.png') !!} <br><br>
			<span class="first">Gerrit</span> 
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
		</div>
		<div class="large-2 column end submitted-user">
			{!! HTML::image('/img/user.png') !!} <br><br>
			<span class="first">Gerrit</span>
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
		</div>
		<div class="large-2 column submitted-user">
			{!! HTML::image('/img/user.png') !!} <br><br>
			<span class="first">Gerrit</span> 
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
		</div>
		<div class="large-2 column end submitted-user">
			{!! HTML::image('/img/user.png') !!} <br><br>
			<span class="first">Gerrit</span>
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
		</div>
		<div class="large-2 column submitted-user">
			{!! HTML::image('/img/user.png') !!} <br><br>
			<span class="first">Gerrit</span> 
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
		</div>
		<div class="large-2 column end submitted-user">
			{!! HTML::image('/img/user.png') !!} <br><br>
			<span class="first">Gerrit</span>
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
		</div>
		<div class="large-2 column end submitted-user">
			{!! HTML::image('/img/user.png') !!} <br><br>
			<span class="first">Gerrit</span>
			<span class="last">Monroe</span> 
			<span class="functie">UVW</span>
		</div>
		
	</div>
</div>
<div class="row ">
	<div class="large-4 column end page-next">	
		<p>
			Heeft iedereen zich kunnen voorstellen? <br />	
			Dan kunt u door naar de...	
		</p>
		<a href="{{ URL::to('algemeenbeeld') }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
