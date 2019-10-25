 {include 'templates/header.tpl'}
 <table class="pedidos_tabla">
        <tr>
          <td>Productos</td>
          <td>Descripcion</td>
          <td>Precio</td>
          <td>Editar</td>
          <td>Borrar</td>
        </tr>
        <tr>
                <td>{$producto->nombre}</td>
                <td>{$producto->descripcion}</td>
                <td>{$producto->precio}</td>
        </tr>
</table>
<form  class="form-group" method= "GET" action="productoEditado" >
        <div class="form-group">
            <label for="nombreProducto">Nombre:</label>
            <input type="text" class="form-control" name="nombreProductoEditado" id="nombreProductoEditado">
        </div>
        <div>
            <label for="descripcionProducto">Descripcion:</label>
            <input type="text" class="form-control" name="descripcionProductoEditado" id="descripcionProductoEditado">
        </div class="form-group">
          <div>
           <label for="precioProducto">Precio:</label>
            <input type="number" class="form-control" name="precioProductoEditado" id="precioProductoEditado">
        </div>
        <button type="submit" class="btn btn-primary">Editar Producto</button> 
    </form>
 </slide>
{include 'templates/footer.tpl'}