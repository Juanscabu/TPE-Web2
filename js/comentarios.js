"use strict"

let app = new Vue({
    el: "#vue-template-comentarios",
    data: {
        title: "Lista renderizada mediante CSR utilizando Vue.js ;)",
        loading: false,
        comentarios: []
    }
});

document.querySelector("#btn-refresh").addEventListener('click', getTareas);

function getComentarios () {
    app.loading = true;
    
    fetch("api/comentarios")
    .then(response => response.json())
    .then(tareas => {
        app.tareas  = tareas;
        app.loading = false;
    })
    .catch(error => console.log(error));
}





function getComentarios () {
    app.loading = true;
    fetch("api/comentariosController/getComentarios")
    .then(response=>response.json())
    .then(comentarios => {
        app.comentarios  = comentarios;
        app.loading = false;
    })
}


getComentarios();