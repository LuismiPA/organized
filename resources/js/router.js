import Vue from 'vue'
import Router from 'vue-router'

import usuarios from './components/admin/Usuarios.vue'
import apartamentos_tabla from './components/tablas/Apartamentos.vue'
import apartamento_perfil from './components/Perfil.vue'
import ticket from './components/admin/Ticket.vue'
import bienvenida from './components/Bienvenida.vue'
import trabajos_tabla from './components/tablas/Trabajo.vue'
import apartmentForm from './components/formularios/ApartamentoForm.vue'
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
            path: '/apartamentos/detalles',
            name: 'apartamentos_tabla',
            component: apartamentos_tabla,
        },
        {
            path: '/apartamento/profile/:id',
            name: 'apartamento_perfil',
            component: apartamento_perfil,
        },
        {
            path: "/trabajos/detalles",
            name: "trabajos_tabla",
            component: trabajos_tabla,
            props: {
                default: true,
            },
        },
        {
            path: '/admin/limpieza/ticket/:id',
            name: 'ticket',
            component: ticket,
            props: {
                default: true,
            },
        },
        {
            name: "bienvenida",
            path: "/bienvenida",
            component: bienvenida,
            props: {
                default: true,
            },
        },
        {
            path: '/apartamento/formulario',
            name: 'apartamntForm',
            component: apartmentForm,
        },
        {
            path: '/limpieza/formulario/:id?',
            name: 'limpiezaForm',
            component: limpiezaForm,
        },

        {
            path: '/limpieza/editar/:id',
            name: 'limpiezaEditar',
            component: limpiezaEditar,
        },
    ]
})