<template>
    <article id="clientesDetalle" class="ml-auto mr-auto mb-3 mt-3 shadow p-3 mb-5 bg-body rounded">
        <h1 class="mt-2 mb-3">Trabajos pendientes</h1>
        <table class="table table-striped">
            <tr>
                <th class="align-middle border-top-0">Id</th>
                <th class="align-middle border-top-0">Apartamento ID</th>
                <th class="align-middle border-top-0">Trabajador ID</th>
                <th class="align-middle border-top-0">Fecha y hora</th>
                <th class="align-middle border-top-0">Tipo de limpieza</th>
                <th class="align-middle border-top-0"></th>
                <!-- <th class="align-middle"><button type="button" class="btn btn-primary float-right">Registrar usuario</button></th> -->
            </tr>
            <tbody>
                <tr class="border-bottom" v-for="trabajo in trabajos" v-bind:key="trabajo.id">
                    <td scope="row">{{ trabajo.id }}</td>
                    <td>{{ trabajo.apartment_id }}</td>
                    <td>{{ trabajo.worker_id }}</td>
                    <td>{{ trabajo.horario }}</td>
                    <td>{{ trabajo.tipo_limpieza }}</td>
                    <td class="iconosTd">
                        
                    </td>
                </tr>
            </tbody>
        </table>
        <a href="/admin/crear" class="btn btn-primary float-right mt-1 registrar">Registrar usuario</a>
    </article>
</template>

<script>
import axios from 'axios'

export default {
    name: 'trabajo',
    data() {
        return {
            usuario:[],
            trabajos: []
        }
    },
    created() {
        axios.get('/user/detalles').then(response => this.usuario = response.data);
        axios.get('/api/limpiezas').then(response => this.trabajos = response.data);
    },
    methods: {
    },
}

</script>