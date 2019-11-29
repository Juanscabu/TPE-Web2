{include 'templates/header.tpl'}
<slide>
<table class="pedidos_tabla"
 <tr>
          <td>Cliente</td>
           <td>Producto</td>
            <td>Direccion</td>
            <td>Cantidad</td>
             <td>Estado</td>
        </tr>
<tr>
                <td>{$pedido->cliente}</td>
                <td>{$pedido->nombre}</td>
                <td>{$pedido->direccion}</td>
                <td>{$pedido->cantidad}</td>
                 {if $pedido->entregado eq 0}
	            <td>Aun no entregado</td>
            {else}  
               <td>Entregado</td>
               {/if}

    <input type="text" id="id_pedido" class="d-none" value="{$pedido->id_pedido}" >     
    <input type="text" id="id_usuario"  value="{$usuario}" >       
        </tr>
</table>
{if ($pedido->imagen != null)}
<div>
              <img src="{$pedido->imagen}" class="d-block w-100" alt="Imagen del pedido">
              </div>
 {/if}

<div>



{literal}
<section id="vue-template-comentarios">
 
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Comentarios</h4>
                <button id="btn-refrescar" type="button" class="btn btn-primary btn-sm"> Refrescar</button>
            </div>
         
            <div v-if="loading" class="card-body">
                Cargando...
            </div>

            <ul v-if="!loading" class="list-group list-group-flush">
                <div v-for="comentario in comentarios"  class="list-group-item list-group-item-action"> -
                    {{ comentario.comentario }} 
                    {{ comentario.puntaje}}
                     <button v-on:click="borrarComentario(comentario.id_comentarios)" class="btn btn-primary btn-sm">borrar</button>
                </div>
            </ul>
</section>
{/literal}


        <form id="formularioComentario" class="form-group">
        <div class="form-group">
            <label for="comentarioPedido">Comentario:</label>
            <input type="text" class="form-control" id="comentario_pedido">
        </div>
        <div>
            <label for="puntajeComentario">Puntaje:</label>
            <input type="number" class="form-control" id="puntajeComentario" min="1" max = "5">       
          
            </div>
        <button type="submit" class="btn btn-primary">Enviar Comentario</button> 
    </form>
            
        </div>

</slide>
   {include 'templates/footer.tpl'}


    