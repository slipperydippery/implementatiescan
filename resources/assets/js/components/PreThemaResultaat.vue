<template>
	<div class="small-12 center">
		<a :href="themaURL" class="button answered" v-if="unanswered == 0">
			Laat resultaat zien
		</a>

		<span class="unanswered" v-else>
			Dank u voor uw antwoorden. <br>
			We wachten nog op {{ unanswered }} overige deelnemer<span v-if="unanswered > 1">s</span> voor het tonen van de resultaten: <br><br>
			<span v-for="name in whoUnanswered">
					{{name}} 
			</span>
			<br>
			<a :href="themaURL" class="button answered">
				Laat resultaat alsnog zien
			</a>

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
				whoUnanswered: [],
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
				this.getWhoIncomplete();
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

			getWhoIncomplete: function () {
				this.$http.get('/api/scan/' + this.scan.id + '/thema/' + this.thema_id + '/getWhoIncomplete')
				.then(response => {
					this.whoUnanswered = response.data;
				}) 
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


<style>
</style>