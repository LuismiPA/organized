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
        <tr v-for="apartamento in apartamentos" v-bind:key="apartamento.id">
                        <th scope="row">{{ apartamento.id }}</th>
                        <td>{{ apartamento.direccion }}</td>
                        <td>{{ apartamento.codigo_postal}}</td>
                        <td>{{ apartamento.id_user }}</td>
                        <td><font-awesome-icon icon="fas fa-edit" /></td>
        </tr>
      </table>
    </div>
</template>

<script>
import axios from 'axios'

    export default {
        name: 'apartamentos',
        created(){
          axios.get('/api/apartment').then(response=>this.apartamentos=response.data);
        },
        data(){
          return {
            apartamentos :[]
          }
        },
    }
</script>