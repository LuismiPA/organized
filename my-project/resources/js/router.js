import Vue from 'vue'
import Router from 'vue-router'

import usuarios from './components/admin/Usuarios.vue'
import apartamentos from './components/admin/apartamentos.vue'
import profile from './components/perfil.vue'
import ticket from './components/admin/ticket.vue'
import bienvenida from './components/Bienvenida.vue'

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
            props: {
                default: true,
            },
        },
        {
            name: "bienvenida",
            path: "/admin/panel/bienvenida",
            component: bienvenida,
            props: {
                default: true,
            },
        },
    ]
})