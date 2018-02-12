import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

export const store = new Vuex.Store({
	state: {
		projects: []
	},
	getters: {
		all_projects(state) {
			return state.projects
		}
	},
	mutations: {
		add_project(state, project) {
			state.projects.push(project)
		}
	}
});
