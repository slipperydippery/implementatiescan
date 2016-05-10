@include('layouts.partials.header')

<img src="{{asset('img/paperclip.png')}}" id="paperclip">



<main>

  @include('layouts.partials.edituser')
    

    <div class="sidetext">
      <div class="sidetext__inner">
        <span class="sidetext__title">Implementatiescan</span>
        <span class="sidetext__sub">Regio {{ $scan->regio }}</span>
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

<div class="site-footer">
	@yield('site-footer')	
  <div class="row">
    <div class="large-12 columns footer-nav">
      <a href=" {{ URL::route('home', $scan) }} "><img src="{{asset('img/home.png')}}"></a>
      <a href=" {{ URL::route('scans.kennismaken', $scan) }} "><img src="{{asset('img/kennismaken.png')}}"></a>
      <a href=" {{ URL::route('scans.director', [$scan, 1, 0]) }} "><img src="{{asset('img/scanicon.png')}}" class="scan_icon"></a>
      <a href=" {{ URL::route('scans.director', [$scan, 1, 0]) }} "><img src="{{asset('img/scanicon.png')}}" class="scan_icon"></a>
      <a href=" {{ URL::route('scans.director', [$scan, 1, 0]) }} "><img src="{{asset('img/scanicon.png')}}" class="scan_icon"></a>
      <a href=" {{ URL::route('scans.actieoverzicht', $scan) }} "><img src="{{asset('img/verbeteracties.png')}}"></a>
      <a href=" {{ URL::route('scans.actiesmailen', $scan) }} "><img src="{{asset('img/mail.png')}}"></a>
      
    </div>
  </div>
</div>

@yield('additional-scripts')

@include('layouts.partials.footer')
