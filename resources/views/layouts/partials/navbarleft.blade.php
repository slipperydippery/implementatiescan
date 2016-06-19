
	<ul class="vertical menu" data-accordion-menu>
		<li >
			<a href="{{ URL::to('/') }}">Home</a>
		</li>
@if(!isset($scan))
	@if(Auth::check() && count(Auth::user()->beheert))
		<li>
			<a href="#">Beheer Scans</a>
			<ul class="menu vertical nested">
				@foreach(Auth::user()->beheert as $beheerscan)
					<li><a href=" {{ URL::route('scans.invoerendeelnemers', $beheerscan) }} "> {{ $beheerscan->title }}</a></li>
				@endforeach
			</ul>
		</li>
	@endif
	@if(Auth::check() && count(Auth::user()->scans))
		<li>
			<a href="#">Participeer in Scans</a>
			<ul class="menu vertical nested">
				@foreach(Auth::user()->scans as $participeerscan)
					<li><a href=" {{ URL::route('scans.intro', $participeerscan) }} "> {{ $participeerscan->title }} </a></li>
				@endforeach
			</ul>
		</li>
	@endif
@endif
@if(isset($scan))
	@if(count(Auth::user()->beheert->intersect([$scan])))
		<li >
			<a href="#">Scan inrichten</a>
			<ul class="menu vertical nested ">
				<li><a href="{{ URL::to('inlog_voorzitter') }}">Inlog beheerder</a></li>
				<li><a href="{{ URL::route('scans.invoerendeelnemers', $scan) }}">Invoeren deelnemersgegevens</a></li>
				<li><a href="{{ URL::route('scans.controlerendeelnemers', $scan) }}">Controleren deelnemersgegevens</a></li>
				<li><a href="{{ URL::route('scans.uitnodigendeelnemers', $scan) }}">Mailen van uitnodiging</a></li>
			</ul>
		</li>
	@endif
		<li>
			<a href="#">Scan deel 1</a>
			<ul class="menu vertical nested">	
				<li >
					<a href="#">Scan starten</a>
					<ul class="menu vertical nested ">
						<li><a href="#">Inloggen</a></li>
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
								<li><a href=" {{ URL::route('scans.director', [$scan, $thema_counter, $question_counter]) }} ">Succesfactor {{ $question_counter }}: {{$question->title}}</a></li>
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
			</ul>
		</li>
		<li >
			<a href="#">Scan deel 2</a>
			<ul class="menu vertical nested">
				<li><a href=" {{ URL::route('scans.werkagenda', $scan) }} ">Werkagenda samenstellen</a></li>
				<li><a href=" {{ URL::route('scans.werkagendamailen', $scan) }} ">Mailen van werkagenda</a></li>
			</ul>
		</li>
@endif
		<li><a href=" {{ URL::route('databank') }} ">Databank</a></li>
@if(Auth::check())
		<li><a href=" {{ URL::to('logout') }} ">Log uit</a></li>
@endif
@if(!Auth::check())
		<li><a href=" {{ URL::to('login') }} ">Log in</a></li>
@endif
<!-- Do some Auth Routes? -->
	</ul>