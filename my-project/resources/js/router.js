import Vue from 'vue'
import Router from 'vue-router'

import usuarios from './components/admin/Usuarios.vue'
import apartamentos from './components/admin/Apartamentos.vue'
import profile from './components/Perfil.vue'
import ticket from './components/admin/Ticket.vue'
import bienvenida from './components/Bienvenida.vue'
import trabajoAdmin from './components/admin/Trabajo.vue'
import trabajo from './components/worker/Trabajo.vue'
import limpiezaForm from './components/formularios/LimpiezaForm.vue'
import limpiezaEditar from './components/formularios/LimpiezaEditar.vue'

Vue.use(Router)
export default new Router({
    mode: 'history',
    routes: [{
            path: '/admin/panel/users',
            name: 'adminUsers',
            component: usuarios,
        },
        {
            path: '/admin/panel/apartments',
            name: 'adminApart',
            component: apartamentos,
        },
        {
            path: '/admin/panel/profile',
            name: 'profile',
            component: profile,
        },
        {
            name: "adminTrabajo",
            path: "/admin/panel/trabajos",
            component: trabajoAdmin,
            props: {
                default: true,
            },
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
        {
            name: "trabajo",
            path: "/worker/panel/trabajos",
            component: trabajo,
            props: {
                default: true,
            },
        },
        {
            path: '/limpieza/crear',
            name: 'limpiezaForm',
            component: limpiezaForm,
        },

        {
            path: '/limpieza/editar',
            name: 'limpiezaEditar',
            component: limpiezaEditar,
        },
    ]
})