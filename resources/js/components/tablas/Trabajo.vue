<template>
    <article id="clientesDetalle" class="ml-auto mr-auto mb-3 mt-3 shadow p-3 mb-5 bg-body rounded">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item" v-if="usuario.tipo === 'admin' || 
                        usuario.tipo==='propietario'">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button btn btn-primary btn-lg btn-block" type="button"
                        data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                        Trabajos pendientes
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <table class="table table-striped">
                            <tr>
                                <th class="align-middle border-top-0">Id</th>
                                <th class="align-middle border-top-0">Apartamento</th>
                                <th class="align-middle border-top-0">Fecha y hora</th>
                                <th class="align-middle border-top-0">Tipo de limpieza</th>
                                <th class="align-middle border-top-0"></th>
                                <!-- <th class="align-middle"><button type="button" class="btn btn-primary float-right">Registrar usuario</button></th> -->
                            </tr>
                            <tbody>
                                <tr class="border-bottom" v-for="pendiente in pendientes" v-bind:key="pendiente.id"
                                    v-if="usuario.tipo === 'admin'">
                                    <td scope="row">{{ pendiente.id }}</td>
                                    <td>{{ pendiente.apartment_id }}</td>
                                    <td>{{ pendiente.horario }}</td>
                                    <td>{{ pendiente.tipo_limpieza }}</td>
                                    <td>{{ pendiente.propietario_id }}</td>
                                    <td class="iconosTd">
                                        <font-awesome-icon icon="fas fa-edit" alt="Editar trabajo"
                                            v-on:click="editarLimpieza(pendiente.id)" class="iconosTabla" />
                                        <font-awesome-icon v-on:click="imprimir(pendiente.id)" icon="fa-solid fa-print"
                                            alt="Imprimir etiqueta" class="iconosTabla" />
                                    </td>
                                </tr>
                                <tr class="border-bottom" v-for="pendiente in pendientes" v-bind:key="pendiente.id"
                                    v-if="usuario.tipo === 'propietario' && usuario.id === pendiente.propietario_id">
                                    <td scope="row">{{ pendiente.id }}</td>
                                    <td>{{ pendiente.apartment_id }}</td>
                                    <td>{{ pendiente.horario }}</td>
                                    <td>{{ pendiente.tipo_limpieza }}</td>
                                    <td>{{ pendiente.propietario_id }}</td>
                                    <td class="iconosTd">
                                        <font-awesome-icon icon="fas fa-edit" alt="Editar trabajo"
                                            v-on:click="editarLimpieza(pendiente.id)" class="iconosTabla" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed btn btn-primary btn-lg btn-block" type="button"
                        data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                        Trabajos Planificados
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <table class="table table-striped">
                            <tr>
                                <th class="align-middle border-top-0">Id</th>
                                <th class="align-middle border-top-0">Apartamento</th>
                                <th class="align-middle border-top-0">Fecha y hora</th>
                                <th class="align-middle border-top-0">Tipo de limpieza</th>
                                <th class="align-middle border-top-0"></th>
                            </tr>
                            <tbody>
                                <tr class="border-bottom" v-for="planificado in planificados"
                                    v-if="usuario.tipo === 'admin'">
                                    <td scope="row">{{ planificado.id }}</td>
                                    <td>{{ planificado.apartment_id }}</td>
                                    <td>{{ planificado.horario }}</td>
                                    <td>{{ planificado.tipo_limpieza }}</td>
                                    <td>{{ planificado.propietario_id }}</td>
                                    <td class="iconosTd">
                                        <font-awesome-icon icon="fas fa-edit" alt="Editar trabajo"
                                            v-on:click="editarLimpieza(planificado.id)" class="iconosTabla" />
                                        <font-awesome-icon v-on:click="imprimir(planificado.id)"
                                            icon="fa-solid fa-print" alt="Imprimir etiqueta" class="iconosTabla" />
                                    </td>
                                </tr>
                                <tr class="border-bottom" v-for="planificado in planificados"
                                    v-if="usuario.tipo === 'propietario' && usuario.id === planificado.propietario_id">
                                    <td scope="row">{{ planificado.id }}</td>
                                    <td>{{ planificado.apartment_id }}</td>
                                    <td>{{ planificado.horario }}</td>
                                    <td>{{ planificado.tipo_limpieza }}</td>
                                    <td>{{ planificado.propietario_id }}</td>
                                    <td class="iconosTd">
                                        <font-awesome-icon icon="fas fa-edit" alt="Editar trabajo"
                                            v-on:click="editarLimpieza(planificado.id)" class="iconosTabla" />
                                    </td>
                                </tr>
                                <tr class="border-bottom" v-for="planificado in planificados"
                                    v-if="usuario.tipo === 'trabajador'">
                                    <td scope="row">{{ planificado.id }}</td>
                                    <td>{{ planificado.apartment_id }}</td>
                                    <td>{{ planificado.direccion }}</td>
                                    <td>{{ planificado.tipo_limpieza }}</td>
                                    <td class="iconosTd">
                                        <font-awesome-icon icon="fa-solid fa-house-circle-check text-success"
                                            alt="Editar trabajo" v-on:click="finalizado(planificado.id)"
                                            class="iconosTabla" />
                                        <font-awesome-icon v-on:click="imprimir(planificado.id)"
                                            icon="fa-solid fa-print" alt="Imprimir etiqueta" class="iconosTabla" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="accordion-item" v-if="usuario.tipo === 'admin' || 
                        usuario.tipo==='propietario'">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed btn btn-primary btn-lg btn-block" type="button"
                        data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree">
                        Trabajos Acabados
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <table class="table table-striped">
                            <tr>
                                <th class="align-middle border-top-0">Id</th>
                                <th class="align-middle border-top-0">Apartamento</th>
                                <th class="align-middle border-top-0">Fecha y hora</th>
                                <th class="align-middle border-top-0">Tipo de limpieza</th>
                                <th class="align-middle border-top-0"></th>
                            </tr>
                            <tbody>
                                <tr class="border-bottom" v-for="acabado in acabados" v-bind:key="acabado.id"
                                    v-if="usuario.tipo === 'admin'">
                                    <td scope="row">{{ acabado.id }}</td>
                                    <td>{{ acabado.apartment_id }}</td>
                                    <td>{{ acabado.horario }}</td>
                                    <td>{{ acabado.tipo_limpieza }}</td>
                                    <td>{{ acabado.propietario_id }}</td>
                                    <td class="iconosTd">
                                        <font-awesome-icon icon="fas fa-edit" alt="Editar trabajo"
                                            v-on:click="editarLimpieza(acabado.id)" class="iconosTabla" />
                                        <font-awesome-icon v-on:click="imprimir(acabado.id)" icon="fa-solid fa-print"
                                            alt="Imprimir etiqueta" class="iconosTabla" />
                                    </td>
                                </tr>
                                <tr class="border-bottom" v-for="acabado in acabados" v-bind:key="acabado.id"
                                    v-if="usuario.tipo === 'propietario' && usuario.id === acabado.propietario_id">
                                    <td scope="row">{{ acabado.id }}</td>
                                    <td>{{ acabado.apartment_id }}</td>
                                    <td>{{ acabado.horario }}</td>
                                    <td>{{ acabado.tipo_limpieza }}</td>
                                    <td>{{ acabado.propietario_id }}</td>
                                    <td class="iconosTd">
                                        <font-awesome-icon icon="fas fa-edit" alt="Editar trabajo"
                                            v-on:click="editarLimpieza(acabado.id)" class="iconosTabla" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" v-on:click="crearLimpieza()" class="btn btn-primary" v-if="usuario.tipo === 'admin' || 
                        usuario.tipo==='propietario'">Crear limpieza</button>
    </article>
</template>

<script>
import axios from 'axios'

export default {
    name: 'trabajo',
    data() {
        return {
            usuario: [],
            trabajos: [],
            acabados: [],
            pendientes: [],
            planificados: [],
        }
    },
    created() {
        axios.get('/user/detalles').then(response => this.usuario = response.data);
        axios.get('/api/limpiezas').then(response => this.trabajos = response.data);
        axios.get('/api/limpiezas/trabajo/acabado').then(response => this.acabados = response.data);
        axios.get('/api/limpiezas/trabajo/pendiente').then(response => this.pendientes = response.data);
        axios.get('/api/limpiezas/trabajo/planificado').then(response => this.planificados = response.data);
    },
    methods: {
        editarLimpieza($id) {
            this.$router.push('/limpieza/editForm/' + $id);
        },
        crearLimpieza() {
            this.$router.push('/limpieza/formulario');
        },

        imprimir(id) {
            this.$router.push({
                path: '/admin/limpieza/ticket/' + id,
            })
        },
        finalizado(id){
            axios.put('/limpieza/finalizado/' + id).then(response => window.location.href = "/")
        }
    }
}

</script>