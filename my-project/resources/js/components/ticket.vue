<template>
  <div id="app">
   <p>{{apartamento.id}}</p>
   <p>{{apartamento.direccion}}</p>
  </div>
</template>

<script>

/* import jspdf from'jspdf' */
export default{
  name:"App",
  data(){
      return{
          apartamento: []
      }
  },
  methods:{
    
  },
  mounted() {
    this.apartamento = this.$route.params.apartamento;
  }
}
</script>