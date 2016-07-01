<template>
	<div class="small-12 center">
		<a :href="themaURL" class="button answered" v-if="unanswered == 0">
			Laat Resultaat Zien
		</a>

		<span class="unanswered" v-else>
			Nog {{ unanswered }} vragen te gaan
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
			this.getNrUnanswered();
			setInterval(function () {
				this.getNrUnanswered();
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