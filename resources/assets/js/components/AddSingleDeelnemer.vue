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
			  <option v-for="instantie in instanties" v-bind:value="instantie.id">
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
			base: '/base',
			headers: {
				'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
			}
	    },

		props: [ 
			'editable',
			'instanties',
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
					instantiemodel_id: '',
					instantie_title: ''
				},
				instantie: {id: 0},
			}
		},

		ready() {
			this.participant.id = Math.floor((Math.random() * 10000) + 10000);
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
				this.$emit('editable', this.participant);
			},

			setNoneEditable: function () {
				this.$emit('editable', {});
			},

			resetNewParticipant: function () {
				this.participant = {
					id: 0,
					name_first: '',
					name_last: '',
					email: '',
					instantie_id: '',
					instantiemodel_id: '',
					instantie_title: ''
				};
				this.participant.id = Math.floor((Math.random() * 10000) + 10000);
			},

			saveNewParticipant: function () {
				this.setInstantiemodelData();
		        this.$emit('pushparticipant', this.participant);
				var resource = this.$resource('/api/scan/:scan/participant/');
				var home = this;
				resource.save({scan: this.scan.id}, 
								{participant: this.participant })
					.then(function (response) {
						home.$emit('updateuser', home.participant, response.data);
				        home.resetNewParticipant();
						this.setNoneEditable();
				    }, function (response) {
				    	console.log('invalid');
				    	home.$emit('removeparticipant', this.participant);
				    });
			},

			setInstantiemodelData: function () {
				for(instantie in this.instanties)
				{
					if(this.participant.instantie_id == this.instanties[instantie].id)
					{
						this.participant.instantiemodel_id = this.instanties[instantie].instantiemodel_id;
						this.participant.instantie_title = this.instanties[instantie].title;
					}
				}
			}
		},
	}
</script>

<style>
</style>