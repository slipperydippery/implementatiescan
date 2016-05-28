<template>
{{ thema_id }}

	<div class="large-12 columns algemeenbeeldslider--group">
		<span style="display:none"> {{ averageValue }} </span>
		<div class="row sliders-sub slider-gemiddeld">
			<div class="small-12 columns">
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
			v-if="allComplete"
		>

			<div class="small-12 columns">
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
	export default {

		components: { },

		props: ['thema_id'],

		data() {
			return {
				instantiePartValues: [],
				allComplete: false,
				unanswered: 12,
				// instanties: instanties,
				scan: scan,
				// thema_id: thema_id,
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
						console.log('getting');
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
				var unanswered = 0;
				for (var insts in this.instantiePartValues)
				{
					for (var parts in this.instantiePartValues[insts].participants)
					{
						participantcount++;
						if (this.instantiePartValues[insts].participants[parts].abvalue != null) {
							totalValue += this.instantiePartValues[insts].participants[parts].abvalue.value;
						} else {
							unanswered++;
						}
					}
				}
				if(unanswered > 0)
				{
					this.unanswered = unanswered;
					this.allComplete = false;
					return 50;
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