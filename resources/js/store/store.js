import axios from 'axios';
import Vue from 'vue/dist/vue.js';
import Vuex from 'vuex';
Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        editMode: false,
        users: {},
        userData: {
            id: '',
            name: "",
            email: "",
            password: "",
            tipo: ""
        }
    },
})