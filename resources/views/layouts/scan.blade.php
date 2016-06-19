@include('layouts.partials.header')
<div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<div class="off-canvas position-left" id="offCanvas" data-off-canvas>

			<!-- Close button -->
			<button class="close-button" aria-label="Close menu" type="button" data-close>
				<span aria-hidden="true">&times;</span>
			</button>

			<!-- Menu -->
			@include('layouts.partials.navbarleft')

		</div>
		<div class="off-canvas-content" data-off-canvas-content>
			<!-- Page content -->
			<img src="{{asset('img/paperclip.png')}}" id="paperclip">
			<div class="navbarleft__hamburger" data-toggle="offCanvas"></div>

			<main>

  				@include('layouts.partials.edituser')
    
			    <div class="sidetext">
			      <div class="sidetext__inner">
			        <span class="sidetext__title">Implementatiescan</span>
			        <span class="sidetext__sub">Regio {{ $scan->regio }}</span>
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
			  <div class="row">
			    <div class="large-12 columns footer-nav">
			      <a href=" {{ URL::route('home', $scan) }} "><img src="{{asset('img/home_line.png')}}" data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Home"></a>
			      <a href=" {{ URL::route('scans.kennismaken', $scan) }} "><img src="{{asset('img/kennismaken_line.png')}}" data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Kennismaken"></a>
			      <?php $menuthemanr = 1 ?>
			      @foreach($scan->scanmodel->themas as $thema)
			        <a href=" {{ URL::route('scans.director', [$scan, $menuthemanr, 0]) }} "><img src="{{asset('img/scanicon_line.png')}}" class="scan_icon"data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Thema {{ $menuthemanr }}: {{ $thema->title }} "></a>
			        <?php $menuthemanr++ ?>
			      @endforeach
			      <a href=" {{ URL::route('scans.actieoverzicht', $scan) }} "><img src="{{asset('img/verbeteracties_line.png')}}" data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover="false" tabindex="1" title="Verbeteracties formuleren"></a>
			      <a href=" {{ URL::route('scans.actiesmailen', $scan) }} "><img src="{{asset('img/mail_line.png')}}" data-tooltip aria-haspopup="true" class="has-tip tip-right" data-disable-hover="false" tabindex="1" title="Verbeteracties mailen"></a>

			  
			    </div>
			  </div>
			</div>

    	</div>
    </div>
</div>


@include('layouts.partials.footer')
