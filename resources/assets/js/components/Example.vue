<template>
	<div class="row">
		<div class="col s12" v-if="loading === false">
			<table class="highlight">
				<thead>
					<tr>
						<th>ID</th>
						<th>Image</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>E-mail</th>
						<th>Role</th>
						<th>Api key</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>{{ user.id }}</td>
						<td><img :src="user.avatar" style="border-radius: 50%; width: 40px;"></td>
						<td>{{ user.first_name }}</td>
						<td>{{ user.last_name }}</td>
						<td>{{ user.email }}</td>
						<td>{{ role }}</td>
						<td>{{ user.api_token }}</td>
					</tr>
				</tbody>
			</table>
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
		props: {
			api_token: {
				type: String,
				required: true
			},
		},
		data() {
			return {
				user: '',
				role: [],
				loading: true
			}
		},
		mounted() {
			this.getUser();
			this.listen();
		},
		methods: {
			getUser () {
				window.axios.get('/api/v2/user?api_token=' + this.api_token).then(response => {
					this.user = response.data.user;
					response.data.roles.forEach( (role) => {
							this.role.push(role.name);
							this.loading = false;
					})
				})
			},
			listen () {
				pusher.subscribe('App.User.1')
					.bind('event', (data) => {
						console.log(data);
					});
			}
		}
	}
</script>
