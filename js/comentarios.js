"use strict"

document.addEventListener('DOMContentLoaded', getComentarios);
document.querySelector("#btn-refrescar").addEventListener('click', getComentarios);
document.querySelector("#formularioComentario").addEventListener('submit', agregarComentario);

let app = new Vue({
    el: "#vue-template-comentarios",
    data: {
        title: "Lista de comentarios",
        loading: false,
        comentarios: [],
        methods: {
          borrarComentario: function (id) {
              borrarComentario(id);
          }
    }
    }
    
});


function getComentarios() {
    app.loading = true;
    let pedidoId = document.querySelector("#id_pedido").value;
    fetch("api/comentarios/" + pedidoId)
    .then(response=>response.json())
    .then(comentarios => {
        app.comentarios  = comentarios;
        app.loading = false;
    })
}

function agregarComentario(e) {
  e.preventDefault();
  let comentarioAgregado = {
     id_pedido: document.querySelector("#id_pedido").value,
     id_usuario: document.querySelector("#id_usuario").value,
     comentario: document.querySelector("#comentario_pedido").value,
     puntaje: document.querySelector("#puntajeComentario").value,
   }
   fetch("api/comentarios", {
  "method": "POST",
  "headers": {"Content-Type": "application/json"},       
  "body": JSON.stringify(comentarioAgregado)
   })
    .then(console.log(comentarioAgregado))
}

function borrarComentario(id) {

  fetch("api/comentarios/" + id, {
    method: "DELETE",
    "headers": {'Content-Type': 'application/json'}     
  })
  
}

