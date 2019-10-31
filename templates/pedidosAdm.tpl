<table class="pedidos_tabla">
       <tr>
          <td>Usuario</td>
          <td>Direccion</td>
          <td>Cantidad</td>
          <td>Estado</td>
          <td>Producto</td>
          <td>Editar</td>
          <td>Borrar</td>
        </tr>
    {foreach  from=$pedidos item=$pedido}
        <tr>
                <td>{$pedido->cliente}</td>
                <td>{$pedido->direccion}</td>
                <td>{$pedido->cantidad}</td>
            {if $pedido->entregado eq 0}
	            <td>Aun no entregado</td>
            {else}  
               <td>Entregado</td>
            {/if}
             <td>{$pedido->nombre}</td>
             <td><a href="editarPedido/{$pedido->id_pedido}" class="btn btn-primary">Editar</a>
             <td><a href="borrarPedido/{$pedido->id_pedido}" class="btn btn-primary">Borrar</a>
        </tr>
    {/foreach}
      </table>
    </slide>
   {include 'templates/footer.tpl'}