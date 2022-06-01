'use strict'

require()

//Selectores
let principal = document.getElementById('principal');
let principalDetalle = document.getElementById('principalDetalle');

let clientes = document.getElementById('clientes');
let clientesDetalle = document.getElementById('clientesDetalle');

let datos = document.getElementById('misDatos');
let datosDetalle = document.getElementById('datosDetalle');

//Display nav
principal.addEventListener('click', e => {
    principalDetalle.style.display = "unset";
    clientesDetalle.style.display = "none";
    datosDetalle.style.display = "none";
})

clientes.addEventListener('click', e => {
    principalDetalle.style.display = "none";
    clientesDetalle.style.display = "unset";
    datosDetalle.style.display = "none";
})

datos.addEventListener('click', e => {
    principalDetalle.style.display = "none";
    clientesDetalle.style.display = "none";
    datosDetalle.style.display = "unset";
})