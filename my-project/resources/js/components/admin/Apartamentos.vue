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
    /*  imprimir(apartamento) {
      const doc = new jspdf();
      doc.text("apartamento numero : "+apartamento.id, 15 ,15);
      doc.text()
      doc.text("apartamento numero : "+apartamento.id, 15 ,30);
      doc.text("Camas dobles : "+apartamento.camas_dobles, 15 ,45);
      doc.text("Baños : "+apartamento.baños, 15 ,60);
 
      // Save the PDF
      doc.save("apartamento.pdf");
    } */

   /*  imprimir(apartamento) {
      var doc = new jspdf();
      var specialElementHandlers = {
        '#getPDF': function (element, renderer) {
          return true;
        },
        '.controls': function (element, renderer) {
          return true;
        }
      };
      let ticket = '<h1>ID apartamento' + apartamento.id + '</h1><p>Baños: ' + apartamento.baños+'</p>';
      doc.html(ticket, {
        callback: function (doc) {
          doc.save('apartamento.pdf');
        }
      }
      );
    } */
  }
}

</script>