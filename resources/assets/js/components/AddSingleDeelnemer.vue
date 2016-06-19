<template>
	<div class="row gebruikers_aanmelden--row" v-if=" ! isEditable ">
		<div class="small-12 columns vuelink" @click="setThisEditable()"> 
			<img :src="returnRoot + '/img/user_dark.png'"> 
			<span class="plus">+</span>
		</div>
	</div>

	<div class="row gebruikers_aanmelden--row" v-if=" isEditable ">
		<div class="small-1 columns" @click="setNoneEditable"> 
			<img :src="returnRoot + '/img/user_dark.png'"> 
			<span class="plus">-</span>
		</div>
		<div class="small-2 columns"> <input type="text" v-model="participant.name_first" placeholder="Voornaam"></div>
		<div class="small-2 columns"> <input type="text" v-model="participant.name_last" placeholder="Achternaam"> </div>
		<div class="small-3 columns"> <input type="text" v-model="participant.email" placeholder="Email"> </div>
		<div class="small-3 columns"> 
			<select v-model="participant.instantie_id">
			  <option v-for="instantie in availableinstanties" v-bind:value="instantie.id">
			    {{ instantie.title }}
			  </option>
			</select>
		</div>
		<div class="small-1 columns">
			<img :src="returnRoot +'/img/checkmark.png'" class="editicon vuelink"  data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover='false' tabindex=1 title="Sla Bewerkingen op" @click="saveNewParticipant" v-if="isValid">
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
			'editable',
			'availableinstanties',
		],

		data() {
			return {
				scan: scan,
				participant: {
					id: 0,
					name_first: '',
					name_last: '',
					email: '',
					instantie_id: '', 
				},
				instantie: {id: 0},
			}
		},

		ready() {
		},

		computed: {
			returnRoot: function () {
				return (window.location.protocol + "//" + window.location.host);
			},	
			isEditable: function () {
				return this.participant.id == this.editable.id;
			},

			isValid: function () {
				if (this.validFirstName && this.validLastName && this.validInstantie && this.validEmail) {
					return true;
				}
				return false;
			},

			validFirstName: function () {
				if (this.participant.name_first.length > 0) {
					return true;
				}
				return false;
			},

			validLastName: function () {
				if (this.participant.name_last.length > 0) {
					return true;
				}
				return false;
			},

			validInstantie: function () {
				if (this.participant.instantie_id > 0) {
					return true;
				}
				return false;
			},

			validEmail: function () {
				if(this.participant.email.length > 8) {
					return true;
				}
				return false;
			}
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

			resetNewParticipant: function () {
				this.participant = {
					id: 0,
					name_first: '',
					name_last: '',
					email: '',
					instantie_id: '', 
				};
				this.$dispatch('reloadParticipants');
			},

			saveNewParticipant: function () {
				// save changes and reload
				var resource = this.$resource('/api/scan/:scan/participant/');

				var home = this;
				resource.save({scan: this.scan.id}, 
								{participant: this.participant })
					.then(function (response) {
				        // success callback
				        home.resetNewParticipant();
						
				    }, function (response) {
				        // error callback
				    });
				// this.removeFromInstantie(this.participant);
				this.setNoneEditable();
				
				// this.tasks = _.reject(this.instantie, participants => participant.id == this.participant.id);
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