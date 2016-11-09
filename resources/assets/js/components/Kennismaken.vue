<template>

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

</style>