<template>
    <div class="abs-center">
        <form class="centrado shadow p-3 mb-5 bg-body rounded" action="javascript:void(0)"
            @submit.prevent="crearApartamento">
            <h1 class="mb-3 text-center">Crear Apartamento</h1>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input class="form-control" type="text" placeholder="Dirección" v-model="apartamento.direccion">
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

                    <input class="form-control" v-if="usuario.tipo === 'propietario'" :placeholder="[usuario.id]"
                        disabled>

                </div>

            </div>
            <div class=" d-flex">
                <button type="submit" class="btn btn-primary mt-0 mb-0 ml-auto mr-auto">Crear Apartamento</button>
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
            apartamento: {
                direccion: "",
                codigo_postal: "",
                habitaciones: "",
                camas_dobles: "",
                camas_indiv: "",
                aseos: "",
                solarium: "",
                propietario_id: ""
            }
        }
    },
    created() {
        axios.get('/user/detalles').then(response => this.usuario = response.data);
        axios.get('/api/user/propietarios').then(response => this.propietarios = response.data);
    },
    methods: {

        crearApartamento() {
            if(this.usuario.tipo=="propietario"){
                this.apartamento.propietario_id=this.usuario.id;
            }
            axios.post('/apartamento/crear', this.apartamento).then(
                this.$router.push({
                    name: "apartamentos_tabla",
                }));
        }
    },
}
</script>