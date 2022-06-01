<template>
  <article id="apartamentosDetalle">
    <h1 class="mt-2 mb-3">Apartamentos</h1>
    <table class="table table-hover">
      <tr>
        <th class="align-middle">Id</th>
        <th class="align-middle">Direccion</th>
        <th class="align-middle">Codigo Postal</th>
        <th class="align-middle">Propietario</th>
        <th></th>
      </tr>
      <tr v-for="apartamento in apartamentos" v-bind:key="apartamento.id">
        <td scope="row">{{ apartamento.id }}</td>
        <td>{{ apartamento.direccion }}</td>
        <td>{{ apartamento.codigo_postal }}</td>
        <td>{{ apartamento.user_id }}</td>
        <td class="iconosTd">
          <font-awesome-icon v-on:click="" icon="fas fa-edit" alt="Editar apartamento" class="iconosTabla" />
          <font-awesome-icon v-on:click="imprimir(apartamento, apartamento.id)" icon="fa-solid fa-print"
            alt="Imprimir etiqueta" class="iconosTabla" />
          <font-awesome-icon v-on:click="" icon="fa-solid fa-user-xmark" alt="Borrar usuario"
            class="iconosTabla text-danger" />
        </td>
      </tr>
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
    /* 
    $table->enum('habitaciones', ['1', '2', '3', '4', '5', '6']);
                $table->enum('camas_dobles', ['1', '2', '3', '4', '5', '6']);
                $table->enum('camas_indiv', ['1', '2', '3', '4', '5', '6', '7', '8']);
                $table->enum('baños', ['1', '2', '3', '4', '5', '6']);
                $table->enum('solarium', ['si', 'no']);
                $table->foreignId("user_id")->constrained('users') */


    imprimir(apartamento, id) {
      this.$router.push({
        name: "ticket",
        params: {
          apartamento,
        },
      });
    }
  }
}
</script>