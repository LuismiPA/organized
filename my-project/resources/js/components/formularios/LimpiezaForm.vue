<template>
    <div class="abs-center">
        <form class="centrado shadow p-3 mb-5 bg-body rounded" action="javascript:void(0)"
            @submit.prevent="crearLimpieza">
            <h1 class="mb-3 text-center">Crear Limpieza</h1>
            <h2>
                {{ usuario.id }}
            </h2>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <select class="form-control" id="floatingSelect" name="apartament_id"
                        aria-label="Floating label select example" v-model="limpieza.apartment_id"
                        v-if="usuario.tipo === 'admin'">
                        <option selected>Apartamento</option>
                        <option v-for=" apartamento in apartamentos" :value='apartamento.id'>{{ apartamento.id }}
                        </option>
                    </select>
                    <select class="form-control" id="floatingSelect" name="apartament_id"
                        aria-label="Floating label select example" v-model="limpieza.apartment_id"
                        v-if="usuario.tipo === 'propietario'">
                        <option v-for=" apartamento in apartamentos" :value='apartamento.id'
                            v-if="apartamento.propietario_id === usuario.id">{{apartamento.id}}
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <select class="form-control" id="floatingSelect" name="tipo_limpieza"
                        aria-label="Floating label select example" v-model="limpieza.tipo">
                        <option selected>Tipo de limpieza</option>
                        <option value="normal">Normal</option>
                        <option value="completa">Completa</option>
                    </select>
                </div>
            </div>
            <div class="form-row" v-if="usuario.tipo === 'admin'">
                <div class="form-group col-md-12">
                    <select class="form-control" id="floatingSelect" name="estado"
                        aria-label="Floating label select example" v-model="limpieza.estado">
                        <option selected>Estado de la limpieza</option>
                        <option value="pendiente">Pendiente</option>
                        <option value="planificada">Planificada</option>
                        <option value="acabada">Acabada</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <select class="form-control" id="floatingSelect" name="worker_id"
                        aria-label="Floating label select example" v-model="limpieza.worker_id"
                        v-if="usuario.tipo === 'admin'">
                        <option selected>Trabajador</option>
                        <option v-for="trabajador in trabajadores" :value='trabajador.id'>
                            {{ trabajador.name }}
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <div class="form-floating">
                        <input class="form-control" type="datetime-local" name="horario"
                            placeholder="Hora de la limpieza" v-model="limpieza.horario" v-if="usuario.tipo === 'admin'">
                    </div>
                </div>
            </div>
            <div class=" d-flex">
                        <button type="submit" class="btn btn-primary mt-0 mb-0 ml-auto mr-auto">Crear limpieza</button>
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
            limpieza: {
                apartment_id: "",
                worker_id: "",
                estado: "",
                tipo: "",
                horario: "",
            }
        }
    },
    created() {
        axios.get('/api/apartment').then(response => this.apartamentos = response.data);
        axios.get('/api/user/trabajadores').then(response => this.trabajadores = response.data);
        axios.get('/user/detalles').then(response => this.usuario = response.data);
    },
    methods: {
        crearLimpieza() {
            axios.post('/limpieza/crear', this.limpieza).then(response => window.location.href = "/");
        }
    },
}
</script>