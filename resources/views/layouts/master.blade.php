@include('layouts.partials.header')

       <img src="{{asset('img/paperclip.png')}}" id="paperclip">
<div class="page-wrap">

    <main>

@include('layouts.partials.edituser')
    

    <span class="backgroundtextleft">succesfactoren</span>
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
