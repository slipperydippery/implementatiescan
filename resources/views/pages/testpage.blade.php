@extends('layouts.master')

@section('content')
<div class="row page-heading">
	<div class="large-12 ">
		<h1>Databank</h1>
		<fieldset class="fieldset">
  			<legend>Een weelde aan informatie</legend>
			<p class=subheading>

			</p>
		</fieldset>
	</div>
</div>



<div class="row page-content">
	<div class="large-12 columns">
		<ul class="vertical menu" data-accordion-menu>
		  <li>
		    <a href="#">Item 1</a>
		    <ul class="menu vertical nested">
		      <li><a href="#">Item 1A</a></li>
		      <li><a href="#">Item 1B</a></li>
		    </ul>
		  </li>
		  <li><a href="#">Item 2</a></li>
		</ul>




<ul class="dropdown menu" data-accordion-menu>
  <li>
    <a>Item 1</a>
    <ul class="menu">
      <li><a href="#">Item 1A</a></li>
      <li>
        <a href="#">Item 1B</a>
        <ul class="menu">
          <li><a href="#">Item 1B i</a></li>
          <li><a href="#">Item 1B ii</a></li>
          <li>
            <a href="#">Item 1B iii</a>
            <ul class="menu">
              <li><a href="#">Item 1B iii alpha</a></li>
              <li><a href="#">Item 1B iii omega</a></li>
            </ul>
          </li>
          <li>
            <a href="#">Item 1B iv</a>
            <ul class="menu">
              <li><a href="#">Item 1B iv alpha</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><a href="#">Item 1C</a></li>
    </ul>
  </li>
  <li>
    <a href="#">Item 2</a>
    <ul class="menu">
      <li><a href="#">Item 2A</a></li>
      <li><a href="#">Item 2B</a></li>
    </ul>
  </li>
  <li><a href="#">Item 3</a></li>
  <li><a href="#">Item 4</a></li>
  </ul>




		<div class="slider" data-slider data-initial-start="50" data-end="200">
		  <span class="slider-handle"  data-slider-handle role="slider" tabindex="1"></span>
		  <span class="slider-fill" data-slider-fill></span>
		  <input type="hidden">
		</div>
	
	</div>

</div>
@stop

