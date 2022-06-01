<template>
  <div>
      <h1 class="mt-2 mb-3">Clientes</h1>
    <table class="table table-hover">
      <tr>
        <th class="align-middle">id</th>
        <th class="align-middle">nombre</th>
        <th class="align-middle">email</th>
        <th class="align-middle">tipo</th>
        <th></th>
        <!-- <th class="align-middle"><button type="button" class="btn btn-primary float-right">Registrar usuario</button></th> -->
      </tr>
      <tr class="border-bottom" v-for="usuario in usuarios" v-bind:key="usuario.id">
        <th scope="row">{{ usuario.id }}</th>
        <td>{{ usuario.name }}</td>
        <td>{{ usuario.email }}</td>
        <td>{{ usuario.tipo }}</td>
        <td class="iconosTd">
          <font-awesome-icon icon="fas fa-edit" alt="Editar usuario" class="iconosTabla" />
          <font-awesome-icon icon="fa-solid fa-house-user" alt="Apartamentos del usuario" class="iconosTabla" />
          <font-awesome-icon v-on:click="eliminarUsuario" icon="fa-solid fa-user-xmark" alt="Borrar usuario" class="iconosTabla text-danger" />
        </td>
      </tr>
    </table>
    <button type="button" class="btn btn-primary float-right mt-1">Registrar usuario</button>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'usuario',
  created() {
    axios.get('/api/user').then(response => this.usuarios = response.data);
  },
  data() {
    return {
      usuarios: []
    }
  },
  methods:{
     
  }
}
</script>
