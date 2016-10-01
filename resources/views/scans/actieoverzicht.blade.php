@extends('layouts.scan', ['title' => 'Gezamenlijke verbeteracties'])

@section('content')
<div class="page-heading--container">
    <div class="row page-heading">
    	<div class="large-12 ">
    		<h1>Gezamenlijke verbeteracties</h1>
    		<fieldset class="fieldset large-8 columns">
      			<p class="subheading subheading__time">
      				Tijdens de Implementatiescan-sessie zijn de volgende verbeteracties geformuleerd. Tijdens de tweede Werkagenda bijeenkomst wordt, met voorbereidend werk door de trekkers e.a., een definitieve keuze gemaakt voor de (formulering van) de verbeteracties die op de Werkagenda komen. Deze acties (met ruimte voor sub acties) kunt u hier invullen.
      			</p>
    		</fieldset>
            <div class="large-4 columns">
                @if(count(Auth::user()->beheert->intersect([$scan])))
                    <div id="time">15:00</div>  
                @endif
            </div>
    	</div>
    </div>
</div>

<div class="row page-content">
	<div class="large-12 columns actiepunten">

		<acties></acties>

	</div>
</div>
<div class="row page-content">

    {!! Form::open(['route' => ['scans.actiesmailen', $scan->id]]) !!}
        <div class="small-8 date__container">
           <label for="datepicker"><h4>
            Plan een vervolgdatum voor het maken van de werkagenda. </h4></label>
            <div class="small-6 columns">
                <input id="datedeeltwee" class="hidden" name="datedeeltwee" type="text" placeholder="Choose a date">
            </div>
            <div class="small-6 columns">
                <!-- Tijd Form Input -->
                <div class="form-group">
                    <input id="timedeeltwee" class="hidden" type="time" name="timedeeltwee">
                </div>
            </div>

        </div>

        <div class="large-12 columns thema-submit-container">
            <!-- Add Submit Field -->
            <div class="form-group">
                {!! Form::submit('Verbeteracties Mailen', ['class' => 'button form-control']) !!}
            </div>
            {{-- <a class="button thema-submit" href="{{ URL::route('scans.actiesmailen', [$scan]) }}">Verbeteracties Mailen</a><br> --}}
        </div>  
    {!! Form::close() !!}

</div>
@stop

@section('additional-scripts')    
    <script src="{{ URL::asset('/js/picker.js') }}"></script>
    <script src="{{ URL::asset('/js/picker.date.js') }}"></script>
    <script src="{{ URL::asset('/js/picker.time.js') }}"></script>

    <script>
      $(function() {
        // Enable Pickadate on an input field
        $('#timedeeltwee').pickatime({
            formatSubmit: 'HH:i',
            hiddenName: true
        });
        $('#datedeeltwee').pickadate({
            monthsFull: [ 'januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december' ],
            monthsShort: [ 'jan', 'feb', 'maa', 'apr', 'mei', 'jun', 'jul', 'aug', 'sep', 'okt', 'nov', 'dec' ],
            weekdaysFull: [ 'zondag', 'maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag' ],
            weekdaysShort: [ 'zo', 'ma', 'di', 'wo', 'do', 'vr', 'za' ],
            formatSubmit: 'yyyy/mm/dd',
            hiddenName: true,
            today: '',
            clear: '',
            close: ''
        });
      });   
    </script>


    <script>
        function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                timer = 0;
            }
        }, 1000);
    }

    window.onload = function () {
        var fifteenMinutes = 60 * 15,
            display = document.querySelector('#time');
        startTimer(fifteenMinutes, display);
    };
    </script>

@stop

