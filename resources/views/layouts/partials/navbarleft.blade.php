
<div class="navbarleft">
	<ul class="vertical menu" data-accordion-menu>
		<li >
			<a href="{{ URL::to('/') }}">Home</a>
		</li>
		<li >
			<a href="#">Scan inrichten</a>
			<ul class="menu vertical nested ">
				<li><a href="{{ URL::to('inlog_voorzitter') }}">Inlog beheerder</a></li>
				<li><a href="{{ URL::route('scans.invoerendeelnemers', $scan) }}">Invoeren deelnemersgegevens</a></li>
				<li><a href="{{ URL::route('scans.controlerendeelnemers', $scan) }}">Controleren deelnemersgegevens</a></li>
				<li><a href="{{ URL::route('scans.uitnodigendeelnemers', $scan) }}">Mailen van uitnodiging</a></li>
			</ul>
		</li>
		<li >
			<a href="#">Scan starten</a>
			<ul class="menu vertical nested ">
				<li><a href="{{ URL::route('scans.intro', $scan) }}">Introductiefilm</a></li>
				<li><a href="{{ URL::route('scans.kennismaken', $scan) }}">Kennismaken</a></li>
				<li><a href="{{ URL::route('scans.algemeenbeeld', $scan) }}">Algemeen beeld</a></li>
				<li><a href=" {{ URL::route('scans.algemeenbeeldresultaat',$scan) }} ">Resultaat algemeen beeld</a></li>
			</ul>
		</li>
		<?php $thema_counter = 1 ?>
		@foreach($scan->scanmodel->themas as $thema)
			<li>
				<a href="#">Scan Thema {{ $thema_counter }}: {{ $thema->title }}</a>
				<ul class="menu vertical nested">
					<li><a href=" {{ URL::route('scans.director', [$scan, $thema_counter, 0]) }} ">Film</a></li>
					<?php $question_counter = 1 ?>
					@foreach($thema->questions as $question)
						<li><a href=" {{ URL::route('scans.director', [$scan, $thema_counter, $question_counter]) }} ">Kernvraag {{ $question_counter }}: {{$question->title}}</a></li>
						<?php $question_counter++ ?>
					@endforeach
					<li><a href=" {{ URL::route('scans.director', [$scan, $thema_counter, $question_counter]) }} ">Thema {{ $thema_counter }}: resultaat</a></li>
				</ul>
			</li>
			<?php $thema_counter++ ?>
		@endforeach

		<li >
			<a href="#">Verbeteracties formuleren</a>
			<ul class="menu vertical nested">
				<li><a href=" {{ URL::route('scans.actieoverzicht', $scan) }} ">Invoeren verbeteracties</a></li>
				<li><a href=" {{ URL::route('scans.actiesmailen', $scan) }} ">Mailen verbeteracties</a></li>
			</ul>
		</li>
		<li >
			<a href="#">Werkagenda samenstellen</a>
			<ul class="menu vertical nested">
				<li>Overzicht verbeteracties</li>
				<li>Invoeren nieuwe acties per onderdeel en plannen van deadline</li>
				<li>Mailen van werkagenda</li>
			</ul>
		</li>
	</ul>
</div>