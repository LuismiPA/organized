<template>
  <div id="app" class="m-auto shadow p-3 mb-5 bg-body rounded">
    <main role="main" class="container">
      <h1> APARTAMENTO {{apartamento.id }}</h1>
      <p class="lead">Habitaciones: {{apartamento.habitaciones}}</p>
      <p class="lead">Camas Dobles: {{apartamento.camas_dobles}}</p>
      <p class="lead">Camas individuales: {{apartamento.camas_indiv}}</p>
      <p class="lead">Baños: {{apartamento.baños}}</p>
      <p class="lead">Solarium: {{apartamento.solarium}}</p>
      <p class="lead">ID propietario: {{apartamento.user_id}}</p>
      <button class="btn btn-danger" v-on:click="imprimir(apartamento)">generate PDF</button>
    </main>

  </div>
</template>

<script>



import jsPDF from 'jspdf'

export default {
  name: "App",
  data() {
    return {
      apartamento: []
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
      doc.text(20, 62, 'Baños: ' + apartamento.baños);
      doc.text(20, 72, 'ID propietario: ' + apartamento.user_id);
      doc.text(20, 82, 'Solarium: ' + apartamento.solarium);

      doc.save('Test.pdf');
    },
  },
  mounted() {
    this.apartamento = this.$route.params.apartamento;
  },
}
</script>
