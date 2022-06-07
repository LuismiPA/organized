<template>
  <article id="clientesDetalle" class="ml-auto mr-auto mb-3 mt-3 shadow p-3 mb-5 bg-body rounded">
    <h1 class="mt-2 mb-3">Clientes</h1>
    <table class="table table-striped">
      <tr>
        <th class="align-middle border-top-0">nombre</th>
        <th class="align-middle border-top-0">email</th>
        <th class="align-middle border-top-0">tipo</th>
        <th class="align-middle border-top-0"></th>
        <!-- <th class="align-middle"><button type="button" class="btn btn-primary float-right">Registrar usuario</button></th> -->
      </tr>
      <tbody>
        <tr class="border-bottom" v-for="usuario in usuarios" v-bind:key="usuario.id">
          <td scope="row">{{ usuario.name }}</td>
          <td>{{ usuario.email }}</td>
          <td>{{ usuario.tipo }}</td>
          <td class="iconosTd">
            <font-awesome-icon v-on:click="editarUsuario(usuario, usuario.id)" icon="fas fa-edit" alt="Editar usuario"
              class="iconosTabla" />
            <font-awesome-icon icon="fa-solid fa-house-user" alt="Apartamentos del usuario" class="iconosTabla" />
            <font-awesome-icon v-on:click="eliminarUsuario(usuario, usuario.id)" icon="fa-solid fa-user-xmark"
              alt="Borrar usuario" class="iconosTabla text-danger" />
          </td>
        </tr>
      </tbody>
    </table>
    <a href="/admin/crear" class="btn btn-primary float-right mt-1 registrar">Registrar usuario</a>
  </article>
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
    editarUsuario(usuario, id) {
      window.location.href = "/admin/editar/" + id;
    },
    eliminarUsuario(usuario, id) {
      if (!confirm('¿Desea eliminar este usuario?')) return;
      axios.delete(`/api/user/${id}`).then(() => {
        window.location.href = "/admin/panel/users";
      }).catch(error => (
        alert(error + ': Error al borrar')
      ))
    },
  }
}
</script>
