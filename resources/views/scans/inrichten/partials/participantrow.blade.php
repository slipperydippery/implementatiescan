<div class="row gebruikers_aanmelden--row <?= $beheerder ? 'row_beheerder' : '' ?>">
	<div class="large-1 columns ">
		<img src="{{asset('img/user_dark.png')}}">
	</div>
	<div class="large-2 columns">
		{{ $participant->name_first ? $participant->name_first : '---' }}
	</div>
	<div class="large-2 columns">
		{{ $participant->name_last ? $participant->name_last : '---' }}
	</div>
	<div class="large-3 columns">
		{{ $participant->email ? $participant->email : '--' }}
	</div>
	<div class="large-3 columns">
		{{ count($participant->instanties->intersect($scan->instanties)) ? $participant->instanties->intersect($scan->instanties)->first()->title : '.' }}
	</div>
	<div class="large-1 columns">
		<a href="#" data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover='false' tabindex=1 title="Bewerk gegevens"> <img src="{{asset('img/editicon.png')}}" class="editicon"></a>
	</div>
</div>