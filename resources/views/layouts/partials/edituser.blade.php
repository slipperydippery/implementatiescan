    @if (Auth::check() && isset($scan)) 
        <div class="float-right top_bar--box dark">
            <a data-open="userModal"> 
           		<img src="{{asset('img/user_light.png')}}">
              	<span class="edituser">{{ Auth::user()->name_first }} </span>
              	<img src="{{asset('img/editicon_light.png')}}" class="editicon">
            </a>


            <div class="reveal" id="userModal" data-reveal>
              	<h1>Bewerk uw gegevens</h1>
              	{!! Form::open(['route' => ['users.edituserinfo', Auth::user(), $scan ]]) !!}
					<!-- Voornaam Form Input -->
					<div class="form-group">
					  {!! Form::label('name_first', 'Voornaam:') !!}
					  {!! Form::text('name_first', Auth::user()->name_first , ['class' => 'form-control']) !!}
					</div>

					<!-- achternaam Form Input -->
					<div class="form-group">
					  {!! Form::label('name_last', 'Achternaam:') !!}
					  {!! Form::text('name_last', Auth::user()->name_last, ['class' => 'form-control']) !!}
					</div>

					<!-- Email Form Input -->
					<div class="form-group">
					{!! Form::label('email', 'Email:') !!}
					{!! Form::text('email', Auth::user()->email, ['class' => 'form-control']) !!}
					</div>

					<!-- Instantie Form Input -->
					<div class="form-group">
					  	{!! Form::label('instantie', 'Instantie:') !!}
					  	<select name="instantie" >
					      	@foreach($scan->instanties as $instantie)
								@if(count(Auth::user()->instanties->intersect([$instantie])))
									<option value=" {{ $instantie->id }} " class="form-control" selected> {{ $instantie->title }} </option>  
								@else
									<option value=" {{ $instantie->id }} " class="form-control"> {{ $instantie->title }} </option>
								@endif
					      	@endforeach
					  	</select>
					</div>

					<!-- Add Submit Field -->
                  	<div class="form-group">
                      	{!! Form::submit('pas aan', ['class' => 'button float-left form-control']) !!}
                	</div>
                	<a href=" {{ URL::to('password/change') }} " class="button float-right" >Reset Wachtwoord</a>
             	{!! Form::close() !!}


              	<button class="close-button" data-close aria-label="Close reveal" type="button">
                	<span aria-hidden="true">&times;</span>
              	</button>
            </div>
            
            
        </div>
    @endif