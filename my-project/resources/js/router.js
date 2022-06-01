import Vue from 'vue'
import Router from 'vue-router'

import usuarios from './components/admin/Usuarios.vue'
import apartamentos from './components/admin/apartamentos.vue'
import profile from './components/perfil.vue'
import ticket from './components/ticket.vue'

Vue.use(Router)
export default new Router({
    mode: 'history',
    routes: [{
            path: '/admin/panel/users',
            name: 'panelUsers',
            component: usuarios,
        },
        {
            path: '/admin/panel/apartments',
            name: 'panelApart',
            component: apartamentos,
        },
        {
            path: '/admin/panel/profile',
            name: 'profile',
            component: profile,
        },
        {
            path: '/admin/panel/apartment/ticket',
            name: 'ticket',
            component: ticket,
        },
        {
            name: "ticket",
            path: "/admin/panel/apartment/ticket",
            props: {
                default: true,
            },
        },
    ]
})