<template>
    <div class="abs-center">
        <form class="centrado shadow p-3 mb-5 bg-body rounded" action="javascript:void(0)"
            @submit.prevent="editarLimpieza(limpieza.id)">
            <h1 class="mb-3 text-center">Editar Limpieza</h1>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input class="form-control" v-model="limpieza.apartment_id" :placeholder="[limpieza.apartment_id]"
                        disabled>
                </div>
                <div class="form-group col-md-6">
                    <select class="form-control" id="floatingSelect" name="worker_id"
                        aria-label="Floating label select example" v-model="limpiezaEditada.worker_id">
                        <option value="" disabled selected>{{ limpieza.worker_id }}</option>
                        <option v-for="trabajador in trabajadores" :value='trabajador.id'>{{ trabajador.name }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-row" v-if="usuario.tipo === 'admin'">
                <div class="form-group col-md-12">
                    <select class="form-control" id="floatingSelect" name="estado"
                        aria-label="Floating label select example" v-model="limpiezaEditada.estado">
                        <option value="" disabled selected>{{ limpieza.estado }}</option>
                        <option value="pendiente" selected>Pendiente</option>
                        <option value="planificada">Planificada</option>
                        <option value="acabada">Acabada</option>
                    </select>
                </div>
            </div>
            <div class="form-row" v-if="usuario.tipo === 'admin'">
                <div class="form-group col-md-6">
                    <select class="form-control" id="floatingSelect" name="tipo_limpieza"
                        aria-label="Floating label select example" v-model="limpiezaEditada.tipo">
                        <option value="" disabled selected>Tipo de limpieza</option>
                        <option value="normal" selected>Normal</option>
                        <option value="completa">Completa</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <div class="form-floating">
                        <input class="form-control" type="datetime-local" name="horario"
                            placeholder="Hora de la limpieza" v-model="limpiezaEditada.horario">
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-primary" id="submit">Modificar Limpieza</button>
            </div>
        </form>
    </div>
</template>

<style scoped>

.abs-center {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 82%;
    min-height: 100vh;
}

.centrado {
    background-color: white;
    width: 40%;
}

 #submit{
     margin: 0 auto;
 }

</style>

<script>
import axios from 'axios'


export default {
    name: 'perfil',
    data() {
        return {
            usuario: [],
            trabajadores: [],
            apartamentos: [],
            limpieza: [],
            limpiezaEditada: {
                apartment_id: "",
                worker_id: "",
                estado: "",
                tipo: "",
                horario: "",
            },

        }
    },
    created() {
        axios.get('/api/apartment').then(response => this.apartamentos = response.data);
        axios.get('/api/user/trabajadores').then(response => this.trabajadores = response.data);
        axios.get('/user/detalles').then(response => this.usuario = response.data);
        axios.get('/api/limpiezas/'+this.$route.params.id).then(response => this.limpieza = response.data);
    },
    methods: {
        editarLimpieza($id) {
            axios.put('/limpieza/editar/' + $id, this.limpiezaEditada).then(response => window.location.href = "/trabajos/detalles");
        }
    },
}
</script>