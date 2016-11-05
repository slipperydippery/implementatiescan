<template>
	<div class="row gebruikers_aanmelden--row" :class="{'row_beheerder' : participant.beheerder}">
		<div v-show="! isEditable">
			<div class="small-1 columns"> <img :src="returnRoot + '/img/user_dark.png'"> </div>
			<div class="small-2 columns"> {{ participant.name_first ? participant.name_first : " ---" }} </div>
			<div class="small-2 columns"> {{ participant.name_last ? participant.name_last : " --- " }} </div>
			<div class="small-3 columns"> {{ participant.email ? participant.email : " --- " }} </div>
			<div class="small-3 columns"> {{ participant.instantie_title }} </div>
			<div class="small-1 columns">
				<img 
					:src="returnRoot +'/img/editicon.png'" 
					class="has-tip editicon vuelink" 
					data-tooltip aria-haspopup="true" 
					data-disable-hover='false' 
					tabindex=1 
					title="Bewerk gegevens"
					@click="setThisEditable" 
				/>
				<a href="#" 
					class="close-button closeicon" 
					aria-label="Close alert" 
					type="button" 
					v-if="!participant.beheerder"
					@click="removeParticipant"
				>
					&times;
				</a>
			</div>
		</div>

		<div v-show="isEditable">
			<div class="small-1 columns"> <img :src="returnRoot + '/img/user_dark.png'"> </div>
			<div class="small-2 columns"> <input type="text" v-model="participant.name_first" placeholder="edit me"></div>
			<div class="small-2 columns"> <input type="text" v-model="participant.name_last" placeholder="edit me"> </div>
			<div class="small-3 columns"> <input type="text" v-model="participant.email" placeholder="edit me"> </div>
			<div class="small-3 columns"> 
				<select v-model="participant.instantie_id">
				  <option v-for="instantie in instanties" v-bind:value="instantie.id">
				    {{ instantie.title }}
				  </option>
				</select>
			</div>
			<div class="small-1 columns">
				<img 
					:src="returnRoot +'/img/checkmark.png'" 
					class="has-tip editicon vuelink"  
					data-tooltip aria-haspopup="true" 
					data-disable-hover='false' 
					tabindex=1 title="Sla Bewerkingen op" 
					v-if="isValid"
					@click="saveChanges" 
				/>
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

		props: [
			'participant', 
			'editable',
			'instanties',
		],

		data() {
			return {
				scan: scan,
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
				return true;
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
			},
		},

		methods: {
			setThisEditable: function () {
				this.$emit('editable', this.participant);
			},

			setNoneEditable: function () {
				this.$emit('editable', {});
			},

			removeParticipant: function () {
				this.$emit('removeparticipant', this.participant);
				var home = this;
				var resource = this.$resource('/api/scan/:scan/participant/:participant');
				resource.delete({scan: this.scan.id, participant: this.participant.id}, {})
					.then(function (response) {
					}, function(response) {
						home.$emit('pushparticipant', home.participant);
					}
				);
			},

			saveChanges: function () {
				this.setInstantiemodelData();
				var resource = this.$resource('/api/scan/:scan/participant/:participant');
				var home = this;
				resource.update({scan: this.scan.id, participant: this.participant.id}, 
								{participant: this.participant})
					.then(function (response) {
						home.$emit('pushparticipant', home.participant);
				    }, function (response) {
				    });
				this.setNoneEditable();
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