@include('layouts.partials.header')

<img src="{{asset('img/paperclip.png')}}" id="paperclip">



<main>

  @include('layouts.partials.edituser')
    

    <div class="sidetext">
      <div class="sidetext__inner">
        <span class="sidetext__title">Implementatiescan</span>
      </div>
    </div>
        

    <div id="content">

        @if(Session::has('global'))
            {{ Session::get('global') }}
        @endif

        @yield('content')
    </div>

	</main>

<div class="site-footer">
	@yield('site-footer')	
</div>



@include('layouts.partials.footer')
