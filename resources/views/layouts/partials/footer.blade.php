
    <script src="{{ URL::asset('js/dependencies.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script> 
    {{-- <script src="{{ URL::asset('js/quest.js') }}"></script>  --}}

	
	@yield('additional-scripts')

 	<script>
  		$(document).foundation();
	</script>

  </body>
</html>
