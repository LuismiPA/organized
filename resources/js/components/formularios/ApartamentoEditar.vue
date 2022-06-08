<template>
    <div class="abs-center">
        <form class="centrado shadow p-3 mb-5 bg-body rounded" action="javascript:void(0)"
            @submit.prevent="editarApartamento(apartamento.id)">
            <h1 class="mb-3 text-center">Editar Apartamento</h1>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input class="form-control" type="text" :placeholder="[[ apartamento.direccion ]]"
                        v-model="apartamento.direccion">
                </div>
                <div class="form-group col-md-6">
                    <input class="form-control" type="number" size="5" placeholder="Código Postal"
                        v-model="apartamento.codigo_postal">
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <select class="form-control" id="floatingSelect" aria-label="Floating label select example"
                        v-model="apartamento.habitaciones">
                        <option value="" disabled selected hidden>Número de habitaciones</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <select class="form-control" id="floatingSelect" aria-label="Floating label select example"
                        v-model="apartamento.camas_dobles">
                        <option value="" disabled selected hidden>Número de camas dobles</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <select class="form-control" id="floatingSelect" aria-label="Floating label select example"
                        v-model="apartamento.camas_indiv">
                        <option value="" disabled selected hidden>Número de camas individuales</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <select class="form-control" id="floatingSelect" aria-label="Floating label select example"
                        v-model="apartamento.aseos">
                        <option value="" disabled selected hidden>Número de aseos</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <select class="form-control" id="floatingSelect" aria-label="Floating label select example"
                        v-model="apartamento.solarium">
                        <option value="" disabled selected hidden>Solarium</option>
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <select class="form-control" id="floatingSelect" v-model="apartamento.propietario_id"
                        aria-label="Floating label select example" v-if="usuario.tipo === 'admin'">
                        <option value="" disabled selected hidden>Propietario</option>
                        <option v-for="propietario in propietarios" :value="propietario.id">
                            {{ propietario.id }}
                        </option>
                    </select>
                    <input class="form-control" name="propietario_id" :value='usuario.id' :placeholder="[usuario.id]"
                        disabled v-if="usuario.tipo === 'propietario'">
                </div>
            </div>
            <div class=" d-flex">
                <button type="submit" class="btn btn-primary mt-0 mb-0 ml-auto mr-auto">Editar Apartamento</button>
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
            propietarios: [],
            apartamento:[],
        }
    },
    created() {
        axios.get('/user/detalles').then(response => this.usuario = response.data);
        axios.get('/api/user/propietarios').then(response => this.propietarios = response.data); 
        axios.get('/api/apartment/'+this.$route.params.id).then(response => this.apartamento = response.data);
    },
    methods: {
        editarApartamento(id) {
            
            axios.put('/apartamento/editar/' + id, this.apartamento).then(
                this.$router.push({
                    name: "apartamentos_tabla",
                })
            );
    },
}
}
</script>