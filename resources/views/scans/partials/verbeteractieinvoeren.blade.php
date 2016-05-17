<div class="row actie-rij">	
	<div class="large-3 columns actie-omschrijving"> {{ $question->title }} </div>
	<div class="large-3 columns">
		<!-- 	actiepunt Form Input -->
		<div class="form-group">
			{!! Form::open(['route' => ['werkagendas.store_omschrijving', $scan]]) !!}
				{!! Form::textarea('actiepunt', null, ['class' => 'form-control','placeholder' => 'actie omschrijving', 'rows' => '1', 'onblur' => 'this.form.submit()']) !!}
			{!! Form::close() !!}
		</div>	
	</div>
	<div class="large-3 columns">
		<!-- 	Trekker Form Input -->
		<div class="form-group">
		    {!! Form::select('trekker', $participantlist, 'selected', ['class' => 'form-control']) !!}
		</div>
	</div>
	<div class="large-3 columns">
		<!-- 	Trekker Form Input -->
		<span class="actiehelper">+</span>						
	</div>
</div>