import Vue from 'vue'
import Router from 'vue-router'

import usuarios from './components/Usuarios.vue'

Vue.use(Router)
export default new Router({
    mode: 'history',
    routes: [{
        path: '/admin/panel',
        name: 'panelUsers',
        component: usuarios,
    }]
})