@include('layouts.partials.header')
       <img src="{{asset('img/paperclip.png')}}" id="paperclip">
<div class="page-wrap">

    <main>

    @if (Auth::check() && isset($scan)) 
    <div class="row">
        <div class="float-right">
            <a data-open="userModal"> {{ Auth::user()->name_first }} </a>
            <div class="reveal" id="userModal" data-reveal>
              <h1>Bewerk uw gegevens</h1>
              {!! Form::open(['route' => ['users.saveuserinfo', Auth::user(), $scan ]]) !!}
                  <!-- Voornaam Form Input -->
                  <div class="form-group">
                      {!! Form::label('name_first', 'Voornaam:') !!}
                      {!! Form::text('name_first', Auth::user()->name_first , ['class' => 'form-control']) !!}
                  </div>

                  <!-- achternaam Form Input -->
                  <div class="form-group">
                      {!! Form::label('name_last', 'achternaam:') !!}
                      {!! Form::text('name_last', Auth::user()->name_last, ['class' => 'form-control']) !!}
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
                      {!! Form::submit('pas aan', ['class' => 'btn form-control']) !!}
                  </div>
              {!! Form::close() !!}

              <button class="close-button" data-close aria-label="Close reveal" type="button">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            
        </div>
    </div>
    @endif
    

    <span class="backgroundtextleft">succesfactoren</span>
        <!-- @include('layouts.partials.navbarleft') -->


        <div id="content">

            @if(Session::has('global'))
                {{ Session::get('global') }}
            @endif

            @yield('content')
        </div>

	</main>
</div> <!-- .page-wrap -->

<div class="site-footer">
	@yield('site-footer')	
</div>

@yield('additional-scripts')

@include('layouts.partials.footer')
