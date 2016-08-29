<template>
	<div v-for="participant in participants | orderBy 'instantie_id'">
		<div class="large-2 column submitted-user">
			<a href="#" class="close-button" aria-label="Close alert" type="button" v-if="scanbeheerder" @click="removeParticipant(participant.id)">
			    <span aria-hidden="true">&times;</span>
			</a>
			<img :src="returnRoot + '/img/user.png'">
			<div class="participant_info">
				<span class="name"> {{ participant.name_first ? participant.name_first : "---" }} {{ participant.name_last ? participant.name_last : "" }} </span> 
				<span class="functie"> {{ participant.instantie_title }} </span>
			</div>
		</div>
	</div>
</template>

<script>

	export default {
		http: {
			root: '/root',
			headers: {
				'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
			}
	    },
		
		props: [],

		data() {
			return {
				participants: [],
				scan: scan,
				scanbeheerder: scanbeheerder,
			}
		},

		ready() {
			this.getParticipants(); 
		},

		computed: {
			returnRoot: function () {
				return (window.location.protocol + "//" + window.location.host);
			},
		},

		methods: {

			getParticipants: function () {
			    this.$http.get('/api/scan/' + this.scan.id + '/participant')
			        .then(response => {
						console.log('here');
			            this.participants = response.data;
						// this.calcAvailableInstanties();
			        });
			},

			removeParticipant: function (participant_id) {
				var resource = this.$resource('/api/scan/:scan/participant/:participant');
				var home = this;
				resource.delete({scan: this.scan.id, participant: participant_id}, {})
					.then(function (response) {
						home.getParticipants();
					}, function(response) {}
				);
			},

			calcAvailableInstanties: function () {
				var tempavailable = [];
				for (var thisparticipant in this.participants) 
				{
					// if(this.participants[insts].participants.length < 2)
					// {
					// 	tempavailable.push({
					// 		'title' : this.participants[insts].title, 
					// 		'id' : this.participants[insts].id
					// 	});
					// } 
				}
				this.availableinstanties = tempavailable;
			}	

		},

		events: {
		    reloadParticipants: function () {
		        this.getParticipants();
		    }
		},

	}
</script>


<style lang="stylus">
	
</style>