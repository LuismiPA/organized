<template>
  <div>
    <h1 class="mt-2 mb-3">Clientes</h1>
    <table class="table table-hover">
      <tr>
        <th class="align-middle">nombre</th>
        <th class="align-middle">email</th>
        <th class="align-middle">tipo</th>
        <th></th>
        <!-- <th class="align-middle"><button type="button" class="btn btn-primary float-right">Registrar usuario</button></th> -->
      </tr>
      <tr class="border-bottom" v-for="usuario in usuarios" v-bind:key="usuario.id">
        <td scope="row">{{ usuario.name }}</td>
        <td>{{ usuario.email }}</td>
        <td>{{ usuario.tipo }}</td>
        <td class="iconosTd">
          <font-awesome-icon v-on:click="editarUsuario(usuario, usuario.id)" icon="fas fa-edit" alt="Editar usuario" class="iconosTabla" />
          <font-awesome-icon icon="fa-solid fa-house-user" alt="Apartamentos del usuario" class="iconosTabla" />
          <font-awesome-icon v-on:click="eliminarUsuario(usuario, usuario.id)" icon="fa-solid fa-user-xmark" alt="Borrar usuario"
            class="iconosTabla text-danger" />
        </td>
      </tr>
    </table>
    <a href="/admin/crear" class="btn btn-primary float-right mt-1 registrar">Registrar usuario</a>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'usuario',
  data() {
    return {
      usuarios: []
    }
  },
  created() {
    axios.get('/api/user').then(response => this.usuarios = response.data);
  },
  methods: {
    editarUsuario(usuario,id){
        window.location.href ="/admin/editar/"+id;
    },
    eliminarUsuario(usuario, id) {
      if (!confirm('¿Desea eliminar este usuario?')) return;
      axios.delete(`/api/user/${id}`).then(() => {
        
        this.$router.push({name: 'panelUsers'});
      }).catch(error => (
        alert(error + ': Error al borrar')
      ))
    },
  }
}
</script>
