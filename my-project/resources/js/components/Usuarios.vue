<template>
    <div>
       <h1>Tabla </h1>
      <table class="table table-hover">
        <tr>
          <th>id</th>
          <th>nombre</th> 
          <th>email</th>
          <th>tipo</th> 
        </tr>
        <tr v-for="usuario in usuarios" v-bind:key="usuario.id">
                        <th scope="row">{{ usuario.id }}</th>
                        <td>{{ usuario.name }}</td>
                        <td>{{ usuario.email}}</td>
                        <td>{{ usuario.tipo }}</td>
        </tr>
      </table>
    <a href="/admin/crear">Registrar usuario</a>
    </div>
</template>

<script>
import axios from 'axios'

    export default {
        name: 'usuario',
        created(){
          axios.get('/api/user').then(response=>this.usuarios=response.data);
        },
        data(){
          return {
            usuarios :[]
          }
        },
    }
</script>
