<template>
  <article id="apartamentosDetalle" class="ml-auto mr-auto mb-3 mt-3 shadow p-3 mb-5 bg-body rounded">
    <h1 class="mt-2 mb-3">Apartamentos</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th class="align-middle border-top-0">Id</th>
          <th class="align-middle border-top-0">Direccion</th>
          <th class="align-middle border-top-0">Codigo Postal</th>
          <th class="align-middle border-top-0">Propietario</th>
          <th class="align-middle border-top-0"></th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-bottom" v-for="apartamento in apartamentos" v-bind:key="apartamento.id">
          <td scope="row">{{ apartamento.id }}</td>
          <td>{{ apartamento.direccion }}</td>
          <td>{{ apartamento.codigo_postal }}</td>
          <td>{{ apartamento.user_id }}</td>
          <td class="iconosTd">
            <font-awesome-icon v-on:click="limpieza(apartamento)" icon="fa-solid fa-hand-sparkles" alt="Limpiar apartamento" class="iconosTabla" />
            <font-awesome-icon v-on:click="" icon="fas fa-edit" alt="Editar apartamento" class="iconosTabla" />
            <font-awesome-icon v-on:click="imprimir(apartamento)" icon="fa-solid fa-print" alt="Imprimir etiqueta"
              class="iconosTabla" />
            <font-awesome-icon v-on:click="" icon="fa-solid fa-user-xmark" alt="Borrar usuario"
              class="iconosTabla text-danger" />
          </td>
        </tr>
      </tbody>
    </table>
  </article>
</template>

<script>
import axios from 'axios'

export default {
  name: 'apartamentos',
  created() {
    axios.get('/api/apartment').then(response => this.apartamentos = response.data);
  },
  data() {
    return {
      apartamentos: []
    }
  },
  methods: {

    imprimir(apartamento, id) {
      this.$router.push({
        name: "ticket",
        params: {
          apartamento,
        },
      });
    },
    limpieza(){

    }
  }
}

</script>