<template>
	<div class="large-12 columns algemeenbeeldslider--group">
		<div class="row sliders-sub slider-gemiddeld">
			<div class="large-2 small-2  columns">
				Gemiddeld
			</div>
			<div class="large-10 small-10 columns">
				<!-- Slider -->
				<div class="small-12 columns">
					<div class="slider" data-slider data-initial-start="50">
						<span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
						<span class="slider-fill" data-slider-fill></span>
					</div>
				</div>
			</div>
		</div>

		<div class="row" v-for="instantie in instanties">
			{{ instantie.title }}
			
		</div>
		<div class="" v-for="thisscan in scan">
			<div class="row" v-for="participant in thisscan.participants">
				{{ participant.name_first }}
				<div class="" v-for="instantie in participant.instanties">
					{{ instantie.title }}
				</div>
				
			</div>
		</div>
			@if(count($instantie->users) > 0)
				<div class="row sliders-sub slider-{{$instantie->instantiemodel->id}}">
					<div class="large-2 small-2 columns">{{ $instantie->title }}</div>
					<div class="large-10 small-10 columns">
						@foreach($instantie->users as $participant)
							<!-- Slider -->
							<div class="small-12 columns">
							  <div class="slider" data-slider data-initial-start="{{ (count($participant->answers->intersect($scan->answers)) > 0) ? $participant->answers->intersect($scan->answers)->last()->value : '50' }}">
							    <span class="slider-handle"  data-slider-handle role="slider" tabindex="1" aria-controls="sliderOutput2"></span>
							    <span class="slider-fill" data-slider-fill></span>
							  </div>
							</div>
						@endforeach
					</div>
				</div>
			@endif
		

	</div>
</template>

<script>
	export default {
		props: [],

		data() {
			return {
				instanties: instanties,
				// participants: participants
			};
		},

		ready() {
	    this.fetchScanParticipants();

			},

		created() {
		},

		methods: {
			fetchScanInstanties: function() {
			    this.$http.get('/api/scan/2/instanties', function(scaninstanties) {
			        this.$set('scaninstanties', scaninstanties);
			    });

			},
			fetchInstantieParticipants: function() {
			    this.$http.get('/api/instantie/2/participants', function(instantieparticipants) {
			        this.$set('instantieparticipants', instantieparticipants);
			    });
			}

		},

		computed: {

		}

	}
</script>


<style>
	
</style>