<template>
  <div id="app" class="m-auto shadow p-3 mb-5 bg-body rounded">
    <main role="main" class="container">
      <h1> APARTAMENTO {{ apartamento.id }}</h1>
      <p class="lead">Habitaciones: {{ apartamento.habitaciones }}</p>
      <p class="lead">Camas Dobles: {{ apartamento.camas_dobles }}</p>
      <p class="lead">Camas individuales: {{ apartamento.camas_indiv }}</p>
      <p class="lead">aseos: {{ apartamento.aseos }}</p>
      <p class="lead">Solarium: {{ apartamento.solarium }}</p>
      <p class="lead">ID propietario: {{ apartamento.propietario_id }}</p>
      <p class="lead">Tipo de limpieza: {{ limpieza.tipo_limpieza }}</p>
      <button class="btn btn-danger" v-on:click="imprimir(apartamento)">generate PDF</button>
    </main>

  </div>
</template>

<script>



import axios from 'axios';
import jsPDF from 'jspdf'

export default {
  name: "App",
  data() {
    return {
      id: [],
      limpieza: [],
      apartamento: [],
    }

  },
  methods: {
    imprimir(apartamento) {
      var doc = new jsPDF();
      doc.setFontSize(25);
      doc.text(20, 20, 'APARTAMENTO ' + apartamento.id);
      doc.setFontSize(12);
      doc.text(20, 32, 'Habitaciones: ' + apartamento.habitaciones);
      doc.text(20, 42, 'Camas Dobles: ' + apartamento.camas_dobles);
      doc.text(20, 52, 'Camas individuales: ' + apartamento.camas_indiv);
      doc.text(20, 62, 'aseos: ' + apartamento.aseos);
      doc.text(20, 72, 'ID propietario: ' + apartamento.propietario_id);
      doc.text(20, 82, 'Solarium: ' + apartamento.solarium);
      doc.text(20, 92, 'Tipo de limpieza: ' + this.limpieza.tipo_limpieza);
      doc.save('Test.pdf');
      window.location.href = "/";
    },
  },
  created() {
    axios.get("/api/limpiezas/" + this.$route.params.id).then(response => {
      this.limpieza = response.data;
      axios.get("/api/apartment/" + this.limpieza.apartment_id).then(e => this.apartamento = e.data);
    }
    )
  }
}
</script>
