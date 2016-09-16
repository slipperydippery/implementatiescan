@include('layouts.partials.header')
<div class="page-wrap">
	<main>
        @include('layouts.partials.nav')


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
