<template>
	<div class="small-12 center">
		<a :href="themaURL" class="button answered" v-if="unanswered == 0">
			Laat Resultaat Zien
		</a>

		<span class="unanswered" v-else>
			Dank u voor uw antwoorden. <br>
			We wachten nog op {{ unanswered }} overige deelnemer<span v-if="unanswered > 1">s</span> voor het tonen van de resultaten.

		</span>
	</div>

</template>

<script>

	import SingleSlider from '../components/SingleSlider.vue';

	export default {

		components: { SingleSlider },

		props: [],

		data() {
			return {
				themaResultaat: [],
				allComplete: false,
				unanswered: 12,
				scan: scan,
				thema_id: thema_id,
				thema_nr: thema_nr,
				allAnswered: false,
			};
		},

		ready() {
			this.getNrIncomplete();
			setInterval(function () {
				this.getNrIncomplete();
			}.bind(this), 1000);
		},

		created() {
		},

		methods: {
			getNrUnanswered: function () {
				this.$http.get('/api/scan/' + this.scan.id + '/thema/' + this.thema_id + '/getNrUnanswered')
				.then(response => {
					this.unanswered = response.data;
				});
			},

			getNrIncomplete: function () {
				this.$http.get('/api/scan/' + this.scan.id + '/thema/' + this.thema_id + '/getNrIncomplete')
				.then(response => {
					this.unanswered = response.data;
				});
			},


			cssPercent: function (value) {
				return value + '%';
			}
		},

		computed: {
			themaURL: function () {
				return '/scans/' + this.scan.id + '/thema/' + this.thema_id +'/' + this.thema_nr + '/themaresultaat';
			}

		},

	}
</script>


<style lang="stylus">

</style>