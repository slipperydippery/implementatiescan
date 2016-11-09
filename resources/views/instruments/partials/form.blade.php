<!-- Titel Form Input -->
<div class="form-group">
	{!! Form::label('title', 'Titel:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Beschrijving Form Input -->
<div class="form-group">
	{!! Form::label('description', 'Beschrijving:') !!}
	{!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Link Form Input -->
<div class="form-group">
	{!! Form::label('adress', 'Link:') !!}
	{!! Form::text('adress', 'http://www.implementatiescan.nl/pdf/', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{{ Form::checkbox('one', true, null) }} Focus op werk
</div>

<div class="form-group">
	{{ Form::checkbox('two', true, null) }} Kwaliteit begeleiding
</div>

<div class="form-group">
	{{ Form::checkbox('three', true, null) }} Effectieve samenwerking
</div>

<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'button form-control']) !!}
</div>




@if(Auth::user()->id == 1)
	<!-- Thema Form Input -->
	@foreach($themalist as $thema)
		<div class="form-group">
			{{ Form::checkbox('themas[]', $thema->id, null) }} {{ $thema->title }}
		</div>
	@endforeach
@endif