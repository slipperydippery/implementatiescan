<template>
	<div class="rangeresult">
		<div class="rangeresult__value" :style="{ width: slidervaluecss }"></div>
	</div>
</template>

<script>
	export default {

		props: ['participant'],

		data() {
			return {
				slidervalue: null
			};
		},

		ready() {
	        var self = this;
			setInterval(function () {
				self.getSliderValue(scan.id, thema, self.participant.id);
			}.bind(self), 1000);
		},

		created() {
		},

		computed: {
			slidervaluecss: function () {
				return this.slidervalue + '%';
			}
		},

		methods: {
			setSliderNew: function()
			{
				this.slidervalue = 30;
				this.setSliderValue(scan.id, thema, this.participant.id);
			},

			/**
			 * Get the value of the slider
			 */
			getSliderValue: function (scan_id, thema_id, user_id) {
				this.$http.get(window.location.protocol + "//" + window.location.host + '/api/scan/' + scan_id + '/thema/' + thema_id + '/user/' + user_id + '/slidervalue')
					.then(response => {
						this.slidervalue = response.data;
				});
			},	

			/**
			 * Delete the given task.
			 */
			setSliderValue: function (scan_id, thema_id, user_id) {
			    this.$http.patch('/api/scan/' + scan_id + '/thema/' + thema_id + '/user/' + user_id + '/setslidervalue', function()
			    {
			    	console.log(this.slidervalue);
			    })
			},

		},


	}
</script>


<style lang="stylus">
	.rangeresult {
		position: relative;
		display: block;
		width: 100;
		height: .5rem;
		background: #ec5840;
	}
	.rangeresult__value {
		position: absolute;
		display: block;
		top: 0;
		left: 0;
		height: 100%;
	    background: #1CB32D;
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