    @if (Auth::check() && isset($scan)) 
        <div class="float-right top_bar--box dark">
            <a data-open="deelnemersModal"> 
              	<span class="edituser"> Deelnemers</span>
            </a>


            <div class="reveal" id="deelnemersModal" data-reveal>
              	<h1>Deelnemers</h1>
              	<div class="textual_table textual_table__bordered">
	              	@foreach($scan->participants as $participant)
		              	<div class="row textual_table--row">
		              		<div class="small-4 columns">
								{{ $participant->name_first }} {{ $participant->name_last }} 
		              		</div>
		              		<div class="small-4 columns">
								<i>{{ $participant->email }}</i>
		              		</div>
		              		<div class="small-2 columns">
		              			{{ $participant->initial_pwd }}
		              		</div>
		              		<div class="small-2 columns">
		              			<a href="{{ URL::route('scans.removeuser', [$scan, $participant]) }}" class="alert ">Verwijder</a>
		              		</div>
		              	</div>
	              	@endforeach
	            </div>

              	<button class="close-button" data-close aria-label="Close reveal" type="button">
                	<span aria-hidden="true">&times;</span>
              	</button>
            </div>
            
            
        </div>
    @endif