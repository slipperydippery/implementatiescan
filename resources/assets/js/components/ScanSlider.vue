<template>


	<div class="large-12 columns algemeenbeeldslider--group">
		<span class="unanswered" v-if=" ! allComplete ">
			Dank u voor uw antwoord. <br>
			We wachten nog op het antwoord van {{ unanswered }} overige deelnemer<span v-if="unanswered > 1">s</span> voor het tonen van een algemeen beeld van de huidige gezamenlijke aanpak: <br>
			<span v-for="name in whoUnanswered">
					{{name}} <br>
			</span>
		</span>
		<span style="display:none"> {{ averageValue }} </span>
		<div class="row sliders-sub slider-gemiddeld" v-if="allComplete">
			<div class="large-2 small-2 columns">
				Gemiddeld 
			</div>
			<div class="large-10 small-10 columns">
				<div class="rangeresult">
					<span style="position: absolute; top: -.65rem; left: -1.5rem">{{ averageValue }}</span>
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
			<div class="large-2 small-2 columns">
				{{ instantie.title }} 
			</div>
			<div class="large-10 small-10 columns">
				<div class="rangeresult" 
					v-for="participant in instantie.participants" 
					:participant="participant"
				>
					<span style="position: absolute; top: -.65rem; left: -1.5rem">{{ participant.abvalue.value }}</span>
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

		props: [],

		data() {
			return {
				instantiePartValues: [],
				allComplete: false,
				unanswered: 12,
				whoUnanswered: [],
				// instanties: instanties,
				scan: scan,
				thema_id: thema_id,
				participantcount: 12,
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
				return (value * 10) + '%';
			}
		},

		computed: {
			allReady: function () {
				var unanswered = this.unanswered;
				if(unanswered > 0) 
				{
					return false;
				}
				return true;
			},
			averageValue: function () {
				var participantcount = 0;
				var totalValue = 0;
				var unanswered = 0;
				var whoUnanswered = [];
				var userIDs = [];
				for (var insts in this.instantiePartValues)
				{
					for (var parts in this.instantiePartValues[insts].participants)
					{
						if(!userIDs.includes(this.instantiePartValues[insts].participants[parts].id)){
							participantcount++;
							userIDs.push(this.instantiePartValues[insts].participants[parts].id);
							if (this.instantiePartValues[insts].participants[parts].abvalue != null) {
								totalValue += this.instantiePartValues[insts].participants[parts].abvalue.value;
							} else {
								unanswered++;
								var fullname = '';
								fullname += this.instantiePartValues[insts].participants[parts].name_first;
								fullname += ' ';
								fullname += this.instantiePartValues[insts].participants[parts].name_last;
	
								whoUnanswered.push(fullname);
							}
						}
					}
				}
				if(unanswered > 0)
				{
					this.unanswered = unanswered;
					this.whoUnanswered = whoUnanswered;
					this.allComplete = false;
					this.participantcount = participantcount;
					return 50;
				}
				this.allComplete = true;
				return Math.round((totalValue * 10) / participantcount)/10;
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