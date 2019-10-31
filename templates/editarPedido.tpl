 {include 'templates/header.tpl'}
 <slide>
<form  class="form-group" method= "GET" action="pedidoEditado" >
        <div class="form-group">
            <label for="nombrePedidoEditado">Nombre:</label>
            <input type="text" class="form-control" name="nombrePedidoEditado" id="nombrePedidoEditado" value="{$pedido->cliente}">
        </div>
        <div>
            <label for="direccionPedidoEditado">Direccion:</label>
            <input type="text" class="form-control" name="direccionPedidoEditado" id="direccionPedidoEditado" value="{$pedido->direccion}">
        </div>
        <div>
            <label for="cantidadPedidoEditado">Cantidad:</label>
            <input type="number" class="form-control" name="cantidadPedidoEditado" id="cantidadPedidoEditado" value="{$pedido->cantidad}">
        </div class="form-group">
          <div>
           <label for="entregadoPedidoEditado">Estado:</label>
            <input type="number" class="form-control" name="entregadoPedidoEditado" id="entregadoPedidoEditado" value="{$pedido->entregado}">
             <input type="text" class="d-none" name="idPedidoEditado" id="idPedidoEditado" value="{$id}">
        </div>
        <button type="submit" class="btn btn-primary">Editar Pedido</button> 
    </form>
 </slide>
{include 'templates/footer.tpl'}