{include 'templates/header.tpl'}
    <slide>
      {if $loggeado == true}
      {include 'templates/pedidosAdm.tpl'}
      {else}
        <form method= "GET" action="enviarPedido" class="form">
        <div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputName4">Nombre</label>
              <input type="name" class="form-control" name="inputName" id="inputName" placeholder="Nombre">
            </div>
            <div class="form-group col-md-6">
              <label for="inputLastname4">Apellido</label>
              <input type="lastname" class="form-control" name="inputLastname" id="inputLastname" placeholder="Apellido">
            </div>
          </div>
          <div class="form-row">
            <label for="inputAddress">Direccion</label>
            <input type="text" class="form-control" name="inputAddress"  id="inputAddress" placeholder="Calle 1234 Casa 1234">
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputPedido">Producto</label>
              <select class="form-control" name="inputPedido" id="inputPedido">
               <option value="" selected>Elegir...</option>
               {foreach  from=$productos item=$producto}
                <option value="{$producto->id_producto}"> {$producto->nombre} </option>
                {/foreach}
               
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputCantidad">Cantidad</label>
              <input type="text" class="form-control" name="inputCantidad" id="inputCantidad" max="24" placeholder="1">
               <button type="submit" class="btn btn-primary" id="realizpedido">Realizar pedido</button>
            </div>
             </div>
        </form>
        
     <table class="pedidos_tabla">
       <tr>
          <td>Usuario</td>
          <td><a class="primary"href="mostrarPedidosOrdenados" class="">Productos</a></td>
          <td>Direccion</td>
          <td>Detalle</td>
        </tr>
    {foreach  from=$pedidos item=$pedido}
        <tr>
                <td>{$pedido->cliente}</td>
                 <td>{$pedido->nombre}</td>
                <td>{$pedido->direccion}</td>
                 <td><a href="detallePedido/{$pedido->id_pedido}" class="btn btn-primary">Detalle</a></td>
        </tr>
    {/foreach}
      </table>
    </slide>
   {include 'templates/footer.tpl'}
{/if}