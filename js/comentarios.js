"use strict"

document.addEventListener('DOMContentLoaded', getComentarios);
document.querySelector("#formularioComentario").addEventListener('submit', agregarComentario);

let app = new Vue({
    el: "#vue-template-comentarios",
    data: {
        title: "Lista de comentarios",
        loading: false,
        comentarios: [],
      },  methods: {
          borrarComentario: function (id) {
              borrarComentario(id);
          },
          getComentarios() {
            getComentarios();
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
   fetch("api/comentarios/" + id_pedido, {
  "method": "POST",
  "headers": {"Content-Type": "application/json"},       
  "body": JSON.stringify(comentarioAgregado)
   })
    setTimeout(function() { 
    getComentarios()
    }, 500)
  }


function borrarComentario(id) {

  fetch("api/comentarios/" + id, {
    method: "DELETE",
    "headers": {'Content-Type': 'application/json'}     
  })
  setTimeout(function() { 
    getComentarios()
    }, 500)
  }


