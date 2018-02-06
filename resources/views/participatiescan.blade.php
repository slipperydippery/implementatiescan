@extends('layouts.participatiescan', ['title' => 'home'])

	<?php  
		$logged = false;
		$inrichten = false;
		$starten = false;
	?>
	@if(Auth::user())
		<?php
			$logged = true;
			if(count(Auth::user()->beheert)){
				$inrichten = true;
			}
			if(count(Auth::user()->scans)){
				$starten = true;
			}

		?>
	@endif
@section('content')
<div class="row page-heading">
	<div class="small-9 columns">
		<div class="row">
			<div class="small-12 ">
				<h1>Implementatiescan</h1>
				<h2>Focus op werk voor en talent van jongeren met een kwetsbare positie</h2>
				<fieldset class="fieldset">
					<p >
						<b>Implementatiescan is vernieuwd!</b>
						<p>De Implementatiescan is vernieuwd en ondergebracht op een nieuwe site: <a href="https://participatiescan.com/" class="visible_link">participatiescan.com</a>. De Participatiescan is ontwikkeld in opdracht van Lecso, Divosa, VNG, MBO Raad, VO Raad, Sectorraad Praktijkonderwijs, Ingrado, UWV, S-BB, MEE NL, VOBC en de ministeries van SZW en OCW door ECORYS en NJi. Concept programmering en uitvoering door EMB AV. Op <a href="https://participatiescan.com/" class="visible_link">participatiescan.com</a> kunt u een nieuw account aanmaken, zelfstandig of in groepsverband scans maken en online met andere vergelijken. </p>
						<br><br>
					</p>
				</fieldset>
			</div>
		</div>
	</div>
	<div class="small-3 columns">
	</div>
</div>



	<div class="site-footer site-footer--home">
		<div class="row">
			<div class="small-12 columns text-center">
				<span class="powered"><a href="https://www.lecso.nl/">'powered by lecso'</a> - <a href="http://www.ecorys.nl/">reseach bij ecorys</a> - <a href="http://embav.nl/">development & communicatie emb av</a></span>
			</div>
		</div>
	</div>
@stop
