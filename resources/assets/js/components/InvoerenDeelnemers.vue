<template>
	<h1>testerino</h1>
	<div v-for="instantie in participants"></div>
	{{ instantie.title}}
		<div class="row gebruikers_aanmelden--row" v-for="participant in thema.participants">
			<div class="small-1"></div>
			<div class="small-2"> {{ participant.name_first }} </div>
			<div class="small-2"> {{ participant.name_last }} </div>
			<div class="small-3"> {{ participant.email }} </div>
			<div class="small-3"> {{ thema.title }} </div>
			<div class="small-1"></div>
		</div>
	</div>
</template>

<script>
	export default {
		props: [],

		data() {
			return {
				scan: scan,
				participants: [],
			}
		},

		ready() {
			this.getParticipants();
		},

		methods: {
			getParticipants: function () {
			    this.$http.get('/api/scan/' + this.scan.id + '/participants')
			        .then(response => {
			            this.participants = response.data;
			        });
			},
		},

	}
</script>


<style lang="stylus">
	
</style>