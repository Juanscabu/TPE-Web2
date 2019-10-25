 <table class="pedidos_tabla">
        <tr>
          <td>Productos</td>
          <td>Descripcion</td>
          <td>Precio</td>
          <td>Editar</td>
          <td>Borrar</td>
        </tr>
    {foreach  from=$productos item=$producto}
        <tr>
                <td>{$producto->nombre}</td>
                <td>{$producto->descripcion}</td>
                <td>{$producto->precio}</td>
                <td><a href="editarProducto/{$producto->id_producto}" class="btn btn-primary">Editar</a>
                <td><a href="borrarProducto/{$producto->id_producto}" class="btn btn-primary">Borrar</a>
        </tr>
    {/foreach}
</table>

<form  class="form-group" method= "POST" action="addProducto" >
        <div class="form-group">
            <label for="nombreProducto">Nombre:</label>
            <input type="text" class="form-control" name="nombreProducto" id="nombreProducto">
        </div>
        <div>
            <label for="descripcionProducto">Descripcion:</label>
            <input type="text" class="form-control" name="descripcionProducto" id="descripcionProducto">
        </div class="form-group">
          <div>
           <label for="precioProducto">Precio:</label>
            <input type="number" class="form-control" name="precioProducto" id="precioProducto">
        </div>
        <button type="submit" class="btn btn-primary">Agregar Producto</button> 
    </form>
 </slide>
{include 'templates/footer.tpl'}