 {include 'templates/header.tpl'}
 <slide>
<form  class="form-group" method= "GET" action="productoEditado" >
        <div class="form-group">
            <label for="nombreProductoEditado">Nombre:</label>
            <input type="text" class="form-control" name="nombreProductoEditado" id="nombreProductoEditado" value="{$producto->nombre}">
        </div>
        <div>
            <label for="descripcionProductoEditado">Descripcion:</label>
            <input type="text" class="form-control" name="descripcionProductoEditado" id="descripcionProductoEditado" value="{$producto->descripcion}">
        </div>
        <div  class="form-group">
            <label for="precioProductoEditado">Precio:</label>
            <input type="number" class="form-control" name="precioProductoEditado" id="precioProductoEditado" value="{$producto->precio}">
            <input type="text" class="d-none" name="idProductoEditado" id="idProductoEditado" value="{$id}">
        </div>
             
        <button type="submit" class="btn btn-primary">Editar Producto</button> 
    </form>
 </slide>
{include 'templates/footer.tpl'}