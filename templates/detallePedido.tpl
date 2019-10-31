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
        </tr>
</table>
</slide>
   {include 'templates/footer.tpl'}