<template>
	<div class="row searchitems">
		<div class="small-6 columns">
			<h3>Zoek op trefwoord</h3>
			<input type="text" v-model="search" placeholder="Vul trefwoord in">
		</div>
	</div>

	<div class="row table-row table-header">
		<div class="small-4 columns">
			Link
		</div>
		<div class="small-8 columns">
			Adress
		</div>
	</div>

	<div class="row table-row table-row--body"
		v-for="link in searchedLinks"
	>
		<div class="small-4 columns">
			{{ link.title }}
		</div>
		<div class="small-8 columns">
			<a :href="pdfAdress(link)" class="visible_link--basic" >
				{{ link.adress }}
			</a>
		</div>
	</div>
</template>

<script>
	export default {
		components: {  },

		props: [],

		data() {
			return {
				search: '',
				links: [],
				themas: [],
				checkedThemas: [],
				admin: admin,
			}
		},

		ready() {
			this.getLinks();
		},

		computed: {
			returnRoot: function () {
				return (window.location.protocol + "//" + window.location.host);
			},

			searchedLinks: function () {
				var self = this;
				return this.links.filter(function(link) {
					if( link.title.toLowerCase().includes(self.search.toLowerCase()) ||
						link.adress.toLowerCase().includes(self.search.toLowerCase()) 
					)
					{
						return true;
					}
				})
			},
		},

		methods: {
			getLinks: function () {
			    this.$http.get('/api/links')
			        .then(response => {
			            this.links = response.data;
			        });
			},

			pdfAdress: function (link) {
				return this.returnRoot + '/link/' + link.adress;
			}
		},
	}
</script>

<style>
	.searchfilter {
		text-align: right;
		label, input {
			display: inline-block;
		}
	}
</style>