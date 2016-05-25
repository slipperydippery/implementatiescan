<template>
	{{ allComplete }}
	<div class="large-12 columns algemeenbeeldslider--group" v-show="allComplete">
		<div class="row sliders-sub slider-gemiddeld">
			<div class="large-2 small-2 columns">Gemiddeld</div>
			<div class="large-10 small-10 columns">
				<div class="rangeresult">
					<div class="rangeresult__value" 
						:style="{ width: cssPercent(averageValue) }"
					>
					</div>
				</div>
			</div>
		</div>

		<div class="row sliders-sub" 
			v-for="instantie in instantiePartValues" 
			:class="'slider-'+instantie.id" 
			v-show="instantie.participants.length"
		>
			<div class="large-2 small-2 columns">
				{{ instantie.title }}
			</div>
			<div class="large-10 small-10 columns">
				<div class="rangeresult" 
					v-for="participant in instantie.participants" 
					:participant="participant"
				>
					<div class="rangeresult__value" 
						v-if="participant.abvalue != null"
						:style="{ width: cssPercent(participant.abvalue.value) }"
					>
					</div>
				</div>
			</div>
		</div>
	</div>

</template>

<script>
	// import SingleSlider from '../components/SingleSlider.vue';
	export default {

		components: { /*SingleSlider*/ },

		props: [],

		data() {
			return {
				instantiePartValues: [],
				allComplete: false,
				instanties: instanties,
				scan: scan,
				thema_id: thema_id,
			};
		},

		ready() {
			this.getParticipants();
			setInterval(function () {
				this.getParticipants();
			}.bind(this), 1000);
		},

		created() {
		},

		methods: {
			getParticipants: function () {
			    this.$http.get('/api/scan/' + this.scan.id + '/thema/' + this.thema_id + '/getParticipantABValues')
			        .then(response => {
			            this.instantiePartValues = response.data;
			        });
			},
			cssPercent: function (value) {
				return value + '%';
			}
		},

		computed: {
			averageValue: function () {
				var participantcount = 0;
				var totalValue = 0;
				for (var insts in this.instantiePartValues)
				{
					for (var parts in this.instantiePartValues[insts].participants)
					{
						participantcount++;
						if (this.instantiePartValues[insts].participants[parts].abvalue != null) {
							totalValue += this.instantiePartValues[insts].participants[parts].abvalue.value;
						} else {
							this.allComplete = false;
							return 50;
						}
					}
				}
				this.allComplete = true;
				return (totalValue / participantcount);
			}
		},

	}
</script>


<style lang="stylus">
	.rangeresult {
		position: relative;
		display: block;
		width: 100%;
		height: .5rem;
		background: #ec5840;
	    margin: .7rem 0 1.4rem;
	}
	.rangeresult__value {
		position: absolute;
		display: block;
		top: 0;
		left: 0;
		height: 100%;
	    background: #1CB32D;
	    webkit-transition: width 1s;
	    transition: width 1s;
	}

	input[type=range]::after {
	    content:"";
	    display: block;
	    position: absolute;
	    top: 0;
	    left: 0;
	    width: 90%;
	    height: .6rem;
	    background: #1CB32D;
	}
</style>