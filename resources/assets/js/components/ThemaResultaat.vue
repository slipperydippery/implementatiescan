<template>
	<single-slider :thema_id="1"></single-slider>

</template>

<script>

	import SingleSlider from '../components/SingleSlider.vue';

	export default {

		components: { SingleSlider },

		props: [],

		data() {
			return {
				themaResultaat: [],
				// allComplete: false,
				// unanswered: 12,
				scan: scan,
				thema_id: thema_id,
			};
		},

		ready() {
			this.getThemaResultaat();
			// setInterval(function () {
			// 	this.getParticipants();
			// }.bind(this), 1000);
		},

		created() {
		},

		methods: {
			getThemaResultaat: function () {
				this.$http.get('/api/scan/' + this.scan.id + '/thema/' + this.thema_id + '/getThemaOverzichtValues')
					.then(response => {
						this.themaResultaat = response.data;
					});
			},

			cssPercent: function (value) {
				return value + '%';
			}
		},

		computed: {

		},

	}
</script>


<style lang="stylus">

</style>