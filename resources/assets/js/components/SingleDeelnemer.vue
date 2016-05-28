<template>
	<div class="row gebruikers_aanmelden--row" :class="{'row_beheerder' : participant.beheerder}">
		<div v-show="! isEditable">
			<div class="small-1 columns"> <img :src="returnRoot + '/img/user_dark.png'"> </div>
			<div class="small-2 columns"> {{ participant.name_first ? participant.name_first : " ---" }} </div>
			<div class="small-2 columns"> {{ participant.name_last ? participant.name_last : " --- " }} </div>
			<div class="small-3 columns"> {{ participant.email ? participant.email : " --- " }} </div>
			<div class="small-3 columns"> {{ instantie.title }} </div>
			<div class="small-1 columns">
				<img :src="returnRoot +'/img/editicon.png'" class="editicon vuelink" @click="setThisEditable" data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover='false' tabindex=1 title="Bewerk gegevens">
				<a href="#" class="close-button closeicon" aria-label="Close alert" type="button" @click="removeParticipant">&times;</a>
			</div>
		</div>

		<div v-show="isEditable">
			<div class="small-1 columns"> <img :src="returnRoot + '/img/user_dark.png'"> </div>
			<div class="small-2 columns"> <input type="text" v-model="participant.name_first" placeholder="edit me"></div>
			<div class="small-2 columns"> <input type="text" v-model="participant.name_last" placeholder="edit me"> </div>
			<div class="small-3 columns"> <input type="text" v-model="participant.email" placeholder="edit me"> </div>
			<div class="small-3 columns"> 
				<select v-model="instantie.id">
				  <option v-for="instantie in myavailableinstanties" v-bind:value="instantie.id">
				    {{ instantie.title }}
				  </option>
				</select>
			</div>
			<div class="small-1 columns">
				<img :src="returnRoot +'/img/checkmark.png'" class="editicon vuelink"  data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover='false' tabindex=1 title="Sla Bewerkingen op" @click="saveChanges">
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

		props: [
			'participant', 
			'instantie', 
			'editable',
			'availableinstanties',
		],

		data() {
			return {
				myavailableinstanties: [],
				scan: scan,
			}
		},

		ready() {
			this.getMyAvailableInstanties();
		},

		computed: {
			returnRoot: function () {
				return (window.location.protocol + "//" + window.location.host);
			},	
			isEditable: function () {
				return this.participant.id == this.editable.id;
			},
		},

		methods: {
			setThisEditable: function () {
				// reload participants
				this.$dispatch('reloadParticipants');
				this.editable = this.participant;
			},

			setNoneEditable: function () {
				this.editable = {};
			},

			removeParticipant: function () {
				var resource = this.$resource('/api/scan/:scan/removeparticipant/:participant');
				var home = this;
				resource.delete({scan: this.scan.id, participant: this.participant.id}, {})
					.then(function (response) {
						home.$dispatch('reloadParticipants');
					}, function(response) {}
				);
			},

			saveChanges: function () {
				// save changes and reload
				var resource = this.$resource('/api/scan/:scan/updateparticipant/:participant');

				var home = this;
				resource.update({scan: this.scan.id, participant: this.participant.id}, 
								{participant: this.participant, instantie: this.instantie.id })
					.then(function (response) {
				        // success callback
						home.$dispatch('reloadParticipants');
						
				    }, function (response) {
				        // error callback
				    });
				// this.removeFromInstantie(this.participant);
				this.setNoneEditable();
				
				// this.tasks = _.reject(this.instantie, participants => participant.id == this.participant.id);
			},
			
			getMyAvailableInstanties: function () {
				this.myavailableinstanties = this.availableinstanties.slice(0);
				for (var thisinstantie in this.myavailableinstanties)
				{
					if (this.myavailableinstanties[thisinstantie].id == this.instantie.id)
					{
						return;
					}
				}
				this.myavailableinstanties.push({'title' : this.instantie.title, 'id' : this.instantie.id});				
			},

			// getParticipants: function () {
			//     this.$http.get('/api/scan/' + this.scan.id + '/participants')
			//         .then(response => {
			//             this.participants = response.data;
			//         });
			// },
		},

	}
</script>


<style lang="stylus">
	
</style>