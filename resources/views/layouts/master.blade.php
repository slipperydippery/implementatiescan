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

		    <main>
				<div class="top_bar">
					<div class="top_bar--box float-left">
						<div class="navbarleft__hamburger" data-toggle="offCanvas"></div>
					</div>

	  				@include('layouts.partials.edituser')
				</div>

				<div class="content-group">

					<div class="sidetext">
						<div class="sidetext__inner">
							<span class="sidetext__title">Implementatiescan</span>
							@if(isset($scan))
								<span class="sidetext__sub">Regio {{ $scan->regio }}</span>
							@endif
						</div>
					</div>


					<div id="content">

						@if(Session::has('global'))
							{{ Session::get('global') }}
						@endif

						@yield('content')
					
						<div class="site-footer">
							@yield('site-footer') 
						</div>
					</div>
				</div>
			</main>

			
    	</div>
    </div>
</div>

@include('layouts.partials.footer')
