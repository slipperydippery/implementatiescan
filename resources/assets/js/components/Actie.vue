<template>
	<div class="row actie-rij" v-for="actie in list" v-if="actie.active">	

		<div class="large-3 columns actie-omschrijving"> 
			{{ actie.title }} 
		</div>

		<div class="large-3 columns">
			<div class="form-group">
			<textarea  class="form-control" placeholder="Actie Omschrijving" v-model="actie.omschrijving" @blur="saveOmschrijving(actie.id, actie.omschrijving)"></textarea>
			</div>
		</div>

		<div class="large-3 columns">
			<div class="form-group">
				<select v-model="actie.user_id">
					<option v-for="participant in participants" :value="participant.id"> 
						{{ participant.name_first }} 
					</option>
				</select>
				{{ actie.user_id }}
			</div>
		</div>

		<div class="large-3 columns">
			<!-- 	Trekker Form Input -->
				
			<span class="actiehelper">+</span>						
		</div>

	</div>
</template>

<script>
	export default {
		props: ['thema_id', 'resource'],

		data() {
			return {
				list: [],
				themas: themas,
				scan: scan,
				participants: participants,
			};
		},

		ready() {

			},

		created() {
			this.fetchVerbeteracties(this.thema_id);
		},

		methods: {
			fetchVerbeteracties: function(thema_id) {
				var resource = this.$resource('../../api/verbeteracties/:id');
				resource.get({ id : thema_id }, function(verbeteracties) {
					this.list = verbeteracties;
				}.bind(this));
			},	
			saveOmschrijving: function(id, omschrijving) {
				this.$http.put('../../api/updateActie/')

				// var resource = this.$resource('../../api/updateActie/');
				// resource.update({body: 'updated body'}, function(verbeteracties) {
				// 	this.list = verbeteracties;
				// }.bind(this));
			}

		},

		// computed: {

		// }

	}
</script>


<style lang="stylus">
	
</style>