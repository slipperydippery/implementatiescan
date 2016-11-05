<template>
	<div v-for="participant in participants">
		<div 
			class="large-2 column submitted-user"
			:class="{ beheerder: participant.beheerder }"
		>
			<a href="#" 
				class="close-button" 
				aria-label="Close alert" 
				type="button" 
				v-if="scanbeheerder" 
				@click="removeParticipant(participant)"
			>
			    <span aria-hidden="true">&times;</span>
			</a>
			<img :src="returnRoot + '/img/user.png'"/>
			<div class="participant_info">
				<span class="name"> 
					{{ participant.name_first ? participant.name_first : "---" }} {{ participant.name_last ? participant.name_last : "" }} 
				</span> 
				<span class="functie"> 
					{{ participant.instantie_title }} 
				</span>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		http: {
			base: '/base',
			headers: {
				'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
			}
	    },
		
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
			            this.participants = response.data;
						this.sortParticipants();
			        });
			},

			sortParticipants: function () {
				this.participants.sort(function(a, b) {
					if (a.instantie_id > b.instantie_id) {
					  return 1;
					}
					if (a.instantie_id < b.instantie_id) {
					  return -1;
					}
					return 0;
				});
				var beheerder = this.getBeheerder();
				this.participants.splice(this.participants.indexOf(beheerder), 1);
				this.participants.unshift(beheerder);
			},

			getBeheerder: function () {
				for(var participant in this.participants)
				{
					if(this.participants[participant].beheerder)
					{
						return this.participants[participant];
					}
				}
			},

			removeParticipant: function (participant) {
				this.participants.splice(this.participants.indexOf(participant), 1);
				var home = this;
				var resource = this.$resource('/api/scan/:scan/participant/:participant');
				resource.delete({scan: this.scan.id, participant: participant.id}, {})
					.then(function (response) {
					}, function(response) {
						home.getParticipants();
					}
				);
			},
		},
	}
</script>

<style>
	.beheerder {
		background: rgba(0,0,0,0.1);
	}
</style>