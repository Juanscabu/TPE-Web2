{include 'templates/header.tpl'}
    <slide>
      <p>
        <form method= "GET" action="enviarPedido" class="form">
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
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="captcha">Captcha:</label>
                <input type="text" id="inputText" class="form-control">
              </div>
              <div class="form-group col-md-4">
                <label for="generatedcaptcha" class="text-white">a</label>
                <input type="text" class="form-control" id="captcha" disabled />
              </div>
              <div class="form-group col-md-4">
                <label for="button-captcha" class="text-white">a</label></br>
                <button type="button" class="btn btn-primary" id="actucaptcha">Actualizar</button>
              </div>
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" id="realizpedido">Realizar pedido</button>
        </form>
      </p>
     <table class="pedidos_tabla">
       <tr>
          <td>Usuario</td>
          <td>Direccion</td>
          <td>Cantidad</td>
          <td>Entregado</td>
        </tr>
    {foreach  from=$pedidos item=$pedido}
        <tr>
                <td>{$pedido->nombre}</td>
                <td>{$pedido->direccion}</td>
                <td>{$pedido->cantidad}</td>
            {if $pedido->entregado eq 0}
	            <td>Aun no entregado</td>
            {else}  
               <td>Entregado</td>
            
                {/if}
        </tr>
    {/foreach}
      </table>
    </slide>
   {include 'templates/footer.tpl'}