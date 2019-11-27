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
{if ($pedido->imagen != null)}
<div>
              <img src="{$pedido->imagen}" class="d-block w-100" alt="Imagen del pedido">
              </div>
 {/if}

<div>
 {include 'templates/vue/comentarios.tpl'}
</div>

</slide>
   {include 'templates/footer.tpl'}