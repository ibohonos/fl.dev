<template>
	<div>
		<div v-if="all_projects.length > 0 && loading === false">
			<div class="prj card-panel hoverable" v-for="project in all_projects">
				<a :href="'/project/' + project.id" class="title">
					{{ project.title }}
				</a> 
				<p class="price right">${{ project.price }}</p>
				<div class="meta">
					<p class="status left">{{ project.status }}</p> 
					<div class="user">
						<!-- <a href="/user/1">
							<img src="/uploads/avatars/1487890320-Test-Customer.jpg" class="avatar project_avatar">
						</a>  -->
						<a href="/user/1" class="name">Test Customer</a>
					</div> 
					<div class="right"> Ставок 0</div>
				</div>
			</div>
		</div>
		<div class="prj card-panel hoverable" v-else-if="all_projects.length === 0 && loading === false">
			<div class="title">
				Нічого не знайдено!
			</div>
		</div>
		<div class="col s12 center" v-if="loading === true">
			<div class="preloader-wrapper active">
				<div class="spinner-layer spinner-blue">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div><div class="gap-patch">
						<div class="circle"></div>
					</div><div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>

				<div class="spinner-layer spinner-red">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div><div class="gap-patch">
						<div class="circle"></div>
					</div><div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>

				<div class="spinner-layer spinner-yellow">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div><div class="gap-patch">
						<div class="circle"></div>
					</div><div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>

				<div class="spinner-layer spinner-green">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div><div class="gap-patch">
						<div class="circle"></div>
					</div><div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		// props: {
		// 	api: {
		// 		type: String,
		// 		required: false
		// 	}
		// },
		data() {
			return {
				loading: true
			}
		},
		mounted() {
			this.getProjects();
			this.listen();
		},
		methods: {
			getProjects () {
				window.axios.get('/api/v1/projects').then(response => {
					if (response.data.length > 0)
						response.data.forEach( (project) => {
							this.$store.commit('add_project', project);
							this.loading = false;
						});
					else
						this.loading = false;
				});
			},
			listen () {
				pusher.subscribe('App.User.1')
					.bind('event', (data) => {
						console.log(data);
					});
			}
		},
		computed: {
			all_projects() {
				return this.$store.getters.all_projects
			}
		}
	}
</script>

<style lang="scss">
	.prj {
		border: 1px solid #6d4c41;
		padding: 10px 25px;
		background: #fff;
		clear: both;

		& > .title {
			font-size: 25px;
		}

		& > .price {
			font-size: 25px;
			color: #6d4c41;
			font-weight: bold;
			margin: 0;
		}

		p {
			margin: 0;
		}

		.meta {
			clear: both;
			height: 25px;
			color: #6d4c41;
			min-height: 90px;
		}

		.user {
			clear: both;

			.name {
				top: 5px;
				position: relative;
			}

			.project_avatar {
				width: 50px;
			}
		}
	}
	
	.avatar {
		width: 100px;
		border-radius: 20px;
		float: left;
		margin: 5px 10px 5px 0;
	}

	.btn_add_project {
		margin-top: -65px;
	}
</style>
