<template>
	<div class="subactie">
		<div class="row">
			<div class="large-11 columns"> 
				<div class="form-group">
					<input type="text" 
						class="form-control" 
						placeholder="Titel Verbeterpunt"  
						v-model="subactie.title"
						@blur="saveSubActie()"
					>
					</input>
				</div>				
			</div>
			<div class="large-1 columns">
				<span class="remove_subactie"
				@click="removeSubactie()"
				>
					x
				</span>
			</div>
		</div>
		<div class="row">
			<div class="large-4 columns">
				<div class="form-group">
					<textarea  
						class="form-control" 
						placeholder="Actie Omschrijving" 
						rows="6"
						v-model="subactie.omschrijving"
						@blur="saveSubActie()"
					>
					</textarea>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="form-group">
					<select 
						v-model="subactie.user_id"
						@blur="saveSubActie()"
					>
						<option 
							v-for="participant in participants" 
							:value="participant.id"
						> 
							{{ participant.name_first }} 
						</option>
					</select>
				</div>
			</div>
			<div class="large-3 columns">
				<div class="betrokkenen__group row">
					<div class="betrokkenen__bet ">
						<div class="actie-betrokkene"
							v-if="!betrokkenen.length"
						>
						+
						</div>
						<div class="actie-betrokkene" 
							v-for="betrokkene in betrokkenen"
							@click="removeBetrokkene(betrokkene)"
						>
							{{betrokkene.name_first}}
							<span class="indication">-</span>
						</div>				
					</div>

					<div class="betrokkenen__unbet">
						<div class="actie-betrokkene" 
							v-for="betrokkene in unBetrokkenen"
							@click="addBetrokkene(betrokkene)"
						>
							{{ betrokkene.name_first }}
							<span class="indication">+</span>
						</div>
					</div>

				</div>
			</div>
			<div class="large-2 columns">
				<div class="form-group">
					<div class="actie-exbetrokkene"
						v-for="externalUser in externalUsers"
					>
						{{ externalUser.name }}
						<a href="#" 
							class="close-button closeicon" 
							aria-label="Close alert" 
							type="button" 
							@click="removeExternaluser(externalUser)"
						>
							&times;
						</a>
					</div>
					<input 
						type="text" 
						v-model="newExternalUser.name"
						placeholder="Voeg iemand toe"
						@blur="addExternaluser()"
						@keyup.enter="addExternaluser()"
					>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="small-4 columns subactie--date">
				<div class="form-group">
				<label>datum:</label> 
					<input type="date"
					v-model="subactie.datum">
				</div>

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
			'subactie', 
			'participants',
		],

		data() {
			return {
				externalUsers: [],
				betrokkenen: [],
				unBetrokkenen: [],
				newExternalUser: {name: ''},
			}
		},

		ready() {
			this.getBetrokkenen();
			this.getExternalusers();
		},

		created() {
		},

		methods: {
			saveSubActie: function () {
				var home = this;
				var resource = this.$resource('/api/subactie/:subactie');
				resource.update({subactie: this.subactie.id}, {subactie: this.subactie})
					.then(function (response) {
					});
			},

			removeSubactie: function () {
				this.$emit('removesubactie', this.subactie);
				var home = this;
				var resource = this.$resource('/api/subactie/:subactie/delete');
				resource.get({subactie: this.subactie.id}, {})
					.then(function(response){
					}, function(response){
				});
			},

			getBetrokkenen: function () {
				this.$http.get('/api/subactie/' + this.subactie.id + '/betrokkene')
					.then(response => {
						this.betrokkenen = response.data;
					});
				this.$http.get('/api/subactie/' + this.subactie.id + '/unbetrokkene')
					.then(response => {
						this.unBetrokkenen = response.data;
					})
			},

			addBetrokkene: function (participant) {
				this.betrokkenen.push(participant);
				this.unBetrokkenen.splice(this.unBetrokkenen.indexOf(participant), 1);
				var home = this;
				var resource = this.$resource('/api/subactie/:subactie/betrokkene/:betrokkene');
				resource.save({subactie: this.subactie.id, betrokkene: participant.id}, {})
					.then(function(response){
					});
			},

			removeBetrokkene: function (participant){
				this.unBetrokkenen.push(participant);
				this.betrokkenen.splice(this.betrokkenen.indexOf(participant), 1);
				var home = this;
				var resource = this.$resource('/api/subactie/:subactie/betrokkene/:betrokkene');
				resource.delete({subactie: this.subactie.id, betrokkene: participant.id}, {})
					.then(function(response){
					});
			},

			getExternalusers: function () {
				this.$http.get('/api/subactie/' + this.subactie.id + '/externaluser')
					.then(response => {
						this.externalUsers = response.data;
					})
			},

			addExternaluser: function (newExternalUser){
				if(! this.newExternalUser.name == ['']){
					var home = this;
					var resource = this.$resource('/api/subactie/:subactie/externaluser/');
					resource.save({subactie: this.subactie.id}, {externaluser: this.newExternalUser.name})
						.then(function (response){
							home.newExternalUser.name = '';
							home.getExternalusers();
						}, function(response) {
					});
				}
			},

			removeExternaluser: function (externaluser) {
				this.externalUsers.splice(this.externalUsers.indexOf(externaluser), 1);
				var home = this;
				var resource = this.$resource('/api/subactie/:subactie/subexternaluser/:externaluser');
				resource.delete({subactie: this.subactie.id, externaluser: externaluser.id}, {})
					.then(function (response) {
					}, function(response){
						home.getExternalusers();
					});
			},
		},		

		computed: {
		},
	}
</script>

<style>
	.subactie {
	    border-bottom: 1px solid #333;
	}

	.subactie > .row {
	    background: rgba(187, 211, 112, 0.22);
	}

	.subactie .row:first-of-type {
	    padding-top: 1rem;
	}

	.subactie--titel {
		font-size: 1rem;
	    background: rgba(187, 211, 112, 0.71);
	    /* border: 1px solid #333; */
	    padding: 1rem;
	    font-weight: 500;
	}

	.subactie--date {
		clear: both;
	}
	.actie_removebetrokkene {
		font-size: 2rem;
		line-height: 1.5rem;
		font-weight: bold;
		float: right; 
		padding: 0 .5rem;
		color: #999;
	}
	.actie_removebetrokkene:hover {
		cursor:pointer;
		color: #000;
	}

	span.remove_subactie {
		float: right;
	    padding: .3rem 0.6rem;
	    margin: 0;
	    height: 100%;
	    left: 0;
	    top: 0;
	    color: white;
	    background: rgba(0, 0, 0, 0.53);
	    font-weight: 500;
	    -webkit-transition: all .5s;
	    transition: all .5s;
	    overflow: hidden;
	    cursor: pointer;
	}

	.actie-exbetrokkene .closeicon {
		display: none;
	}

	.actie-exbetrokkene:hover .closeicon {
		display: block;
	}
</style>