@include('layouts.partials.header')

<img src="{{asset('img/paperclip.png')}}" id="paperclip">


<div class="page-wrap">

<main>

  @include('layouts.partials.edituser')
    

    <div class="sidetext">
      <div class="sidetext__inner">
        <span class="sidetext__title">Implementatiescan</span>
        <span class="sidetext__sub">{{ $scan->title }}, Regio {{ $scan->regio }}</span>
      </div>
    </div>
        
    <div class="navbarleft__hamburger"></div>
     @include('layouts.partials.navbarleft')


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
  <div class="row">
    <div class="large-12 columns footer-nav">
    
    </div>
  </div>
</div>

@yield('additional-scripts')

@include('layouts.partials.footer')
