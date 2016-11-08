<template>
	<div class="table">
		<div class="row table-row table-header">
			<div class="small-3 columns">
				School
			</div>
			<div class="small-2 columns">
				Beheerder
			</div>
			<div class="small-1 columns">
				Deelnmrs
			</div>
			<div class="small-2 columns">
				Datum
			</div>
			<div class="small-1 columns">
				Deel 1
			</div>
			<div class="small-1 columns">
				Deel 2
			</div>
			<div class="small-1 columns">
				Test
			</div>
			<div class="small-1 columns">
				Admin
			</div>
		</div>
	

		<div class="row table-row"
			v-for="scan in scans"
		>
			<div class="small-3 columns">
				<a :href="returnRoot + '/scans/' + scan.id + '/edit' ">
					{{ scan.title }} - {{ scan.regio }}
				</a>
			</div>
			<div class="small-2 columns">
				{{ findUserById(scan.user_id).name_first }} {{ findUserById(scan.user_id).name_last }}
			</div>
			<div class="small-1 columns">
				{{ scan.participants.length }}
			</div>
			<div class="small-2 columns">
				{{ scan.datedeeleen }}
			</div>
			<div class="small-1 columns">
				{{ scan.deeleencomplete ? '&#x2713;' : '&#x2716;' }}
			</div>
			<div class="small-1 columns">
				{{ scan.deeltweecomplete ? '&#x2713;' : '&#x2716;' }}
			</div>
			<div class="small-1 columns" 
				@click="updateTestscan(scan)"
			>
				{{ scan.testscan ? 'ja' : 'nee' }}
			</div>
			<div class="small-1 columns">
				
				<a :href="returnRoot + '/scans/' + scan.id + '/edit' "> Edit </a>
				<a :href="returnRoot + '/scans/' + scan.id + '/destroy' "> Del </a>
			</div>

		</div>
		    
	</div>
</template>

<script>
	// import scanoverviewHub from '../eventhubs/ScanoverviewHub.js';
	export default {
		http: {
			base: '/base',
			headers: {
				'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
			}
	    },

		props: [
		],

		data() {
			return {
				scans: [],
				users: [],
			};
		},

		ready() {
			this.getScans();
			this.getUsers();
		},

		methods: {
			getScans: function () {
				var home = this;
				var resource = this.$resource('/api/scan');
				resource.get({}).then(function (response){
					home.$set('scans', response.data)
				});
			},

			updateScan: function (scan) {
				var home = this;
				var resource = this.$resource('/api/scan/:scan');
				resource.update({scan: scan.id}, {scan: scan})
					.then(function (response){
						scanoverviewHub.$emit('reloadCriteria');
				});
			},

			getUsers: function () {
				var home = this;
				var resource = this.$resource('/api/user');
				resource.get({}).then(function (response){
					home.$set('users', response.data)
				});
			},

			findUserById: function (user_id) {
				for(user in this.users) {
					if (this.users[user].id == user_id) {
						return this.users[user];
					}
				}
				return {name_first: '', name_last: ''};
			},

			updateTestscan: function (scan) {
				scan.testscan = ! scan.testscan;
				this.updateScan(scan);
			},

			cssPercent: function (value) {
				return (value * 10) + '%';
			},
		},

		computed: {
			returnRoot: function () {
				return (window.location.protocol + "//" + window.location.host);
			},
		}
	}
</script>


<style>
	.graphbar {
		height: 1.5rem;
		background: #bed675;
	}
</style>