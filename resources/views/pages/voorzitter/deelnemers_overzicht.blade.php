@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Controleren deelnemersgegevens</h1>
		<fieldset class="fieldset">
  			<legend>Dit is het team dat u heeft samengesteld</legend>
			<p class=subheading>
				Hieronder ziet u het team dat u heeft samengesteld. Controleer of uw team compleet is. En controleer of de gegevens juist zijn. De scan is nu bijna klaar voor gebruik. En u kunt alle geselecteerde deelnemers gaan uitnodigen. <br><br> 
				Op de volgende pagina staat een email klaar die u eventueel kunt aan passen en aan de deelnemers kunt versturen. 
			</p>
		</fieldset>
	</div>
</div>

<div class="row page-content">
	
	<div class="large-12 columns submitted-users">
		<h4>Aangemeldde Deelnemers: </h4>

		<div class="large-2 column submitted-user">
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

		<a href="{{ URL::to('deelnemers_uitnodigen') }}" class="button button-next">Volgende Stap</a>
	</div>
</div>

@stop
