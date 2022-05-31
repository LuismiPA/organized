<template>
    <div>
       <h1>Tabla </h1>
      <table class="table table-hover">
        <tr>
          <th>nombre</th>
          <th>tipo</th> 
          <th>email</th> 
        </tr>
        <tr v-for="usuario in usuarios" v-bind:key="usuario.id">
                        <th scope="row">{{ usuario.id }}</th>
                        <td>{{ usuario.name }}</td>
                        <td>{{ usuario.email}}</td>
                        <td>{{ usuario.tipo }}</td>
        </tr>
      </table>
    <a href="/admin/crear">Registra usuario</a>
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
