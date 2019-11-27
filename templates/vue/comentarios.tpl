{literal}
<section id="vue-template-comentarios">
        <input type="text" class="d-none" name="idPedido" id="idPedido" value="{$id}">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Comentarios</h4>
                <button id="btn-refrescar" type="button" class="btn btn-primary btn-sm">Refrescar</button>
            </div>

            <div v-if="loading" class="card-body">
                Cargando...
            </div>

            <ul v-if="!loading" class="list-group list-group-flush">
                <a v-for="comentario in comentarios" v-bind:href="'comentario/' + comentario.id_comentario" class="list-group-item list-group-item-action"> 
                    {{ comentario.titulo }} 
                </a>
            </ul>

            <div class="card-footer text-muted">
                {{ title }}
            </div>
        </div>

       
        
</section>
{/literal}
