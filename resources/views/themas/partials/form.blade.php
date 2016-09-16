<!-- Titel Form Input -->
<div class="form-group">
	{!! Form::label('title', 'Titel:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Beschrijving Form Input -->
<div class="form-group">
	{!! Form::label('blurb', 'Beschrijving:') !!}
	{!! Form::text('blurb', null, ['class' => 'form-control']) !!}
</div>

<!-- Succesfactor Form Input -->
<div class="form-group">
	{!! Form::label('succesfactor', 'Succesfactor:') !!}
	{!! Form::text('succesfactor', null, ['class' => 'form-control']) !!}
</div>

<!-- Weergave Succesfactor Form Input -->
<div class="form-group">
	{!! Form::label('weergave_succesfactor', 'Weergave Succesfactor:') !!}
	{!! Form::text('weergave_succesfactor', null, ['class' => 'form-control']) !!}
</div>

<!-- Norm Form Input -->
<div class="form-group">
	{!! Form::label('norm', 'Norm:') !!}
	{!! Form::text('norm', null, ['class' => 'form-control']) !!}
</div>

<h2>Video</h2>
<!-- Video_title Form Input -->
<!-- Thema Video Form Input -->
<div class="form-group">
    {!! Form::label('video_id', 'Thema Video:') !!}
    {!! Form::select('video_id', $videolist, null, ['class' => 'form-control']) !!}
</div>

<!-- Add Submit Field -->
<div class="form-group">
    {!! Form::submit($submittext, ['class' => 'btn form-control']) !!}
</div>