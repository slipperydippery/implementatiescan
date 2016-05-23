<div class="row actie-rij">	
	{!! Form::open(['route' => ['werkagendas.store_changes', $scan, 'id' => 'actie-form']]) !!}
		<!-- Hidden verbeteractie_id Type Form Input -->
		{!! Form::hidden('verbeteractie_id', $question->verbeteractie->id, null) !!}

		<div class="large-3 columns actie-omschrijving"> {{ $question->title }} </div>

		<div class="large-3 columns">
			<!-- 	actiepunt Form Input -->
			<div class="form-group">
				{!! Form::textarea('actiepunt', $question->verbeteractie->omschrijving, ['class' => 'form-control actie-omschrijving','placeholder' => 'actie omschrijving', 'rows' => '1']) !!}
			</div>	
		</div>

		<div class="large-3 columns">
			<!-- 	Trekker Form Input -->
			<div class="form-group">
			    {!! Form::select('trekker_id', $participantlist, $question->verbeteractie->user_id, ['class' => 'form-control', 'onchange' => 'this.form.submit()']) !!}
			</div>
		</div>

		<div class="large-3 columns">
			<!-- 	Trekker Form Input -->
			<span class="actiehelper">+</span>						
		</div>
	{!! Form::close() !!}
</div>