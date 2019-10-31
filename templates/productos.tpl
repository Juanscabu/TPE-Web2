{include 'templates/header.tpl'}
  <slide>
  {if $loggeado == true}
{include "productosAdm.tpl"}
{else}
     <table class="pedidos_tabla">
        <tr>
          <td>Productos</td>
          <td>Descripcion</td>
          <td>Precio</td>
        </tr>
    {foreach  from=$productos item=$producto}
        <tr>
          <td>{$producto->nombre}</td>
           <td>{$producto->descripcion}</td>
           <td>{$producto->precio}</td>
        </tr>
    {/foreach}
</table>
    </slide>
{include 'templates/footer.tpl'}
{/if} 
