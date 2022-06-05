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
        <!-- Si es admin -->
        <tr class="border-bottom" v-for="apartamento in apartamentos" v-if="usuario.tipo === 'admin'">
          <td scope="row">{{ apartamento.id }}</td>
          <td>{{ apartamento.direccion }}</td>
          <td>{{ apartamento.codigo_postal }}</td>
          <td>{{ apartamento.propietario_id }}</td>
          <td class="iconosTd">
            <font-awesome-icon v-on:click="crearLimpieza(apartamento.id)" icon="fa-solid fa-hand-sparkles"
              alt="Limpiar apartamento" class="iconosTabla" />
            <font-awesome-icon v-on:click="" icon="fas fa-edit" alt="Editar apartamento" class="iconosTabla" />
            <font-awesome-icon v-on:click="imprimir(apartamento)" icon="fa-solid fa-print" alt="Imprimir etiqueta"
              class="iconosTabla" />
            <font-awesome-icon v-on:click="" icon="fa-solid fa-user-xmark" alt="Borrar usuario"
              class="iconosTabla text-danger" />
          </td>
        </tr>
        <tr class="border-bottom" v-for="apartamento in apartamentos"
          v-if="usuario.tipo === 'propietario' && usuario.id === apartamento.propietario_id">
          <td scope="row">{{ apartamento.id }}</td>
          <td>{{ apartamento.direccion }}</td>
          <td>{{ apartamento.codigo_postal }}</td>
          <td>{{ apartamento.propietario_id }}</td>
          <td class="iconosTd">
            <font-awesome-icon v-on:click="crearLimpieza(apartamento.id)" icon="fa-solid fa-hand-sparkles"
              alt="Limpiar apartamento" class="iconosTabla" />
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
  data() {
    return {
      usuario: [],
      apartamentos: [],
    }
  },
  created() {
    axios.get('/user/detalles').then(response => this.usuario = response.data);
    axios.get('/api/apartment').then(response => this.apartamentos = response.data);
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
    crearLimpieza($id) {
      this.$router.push('/limpieza/formulario/', {
        params: {
          id: $id,
        }
      });
    }
  }
}


</script>