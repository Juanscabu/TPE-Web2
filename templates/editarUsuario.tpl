 {include 'templates/header.tpl'}
 <slide>
<form  class="form-group" method= "GET" action="usuarioEditado" >
        <div class="form-group">
            <label for="permisoEditado">Permiso:</label>
            <input type="number" class="form-control" name="permisoEditado" value="{$usuario->permiso}" min="0" max="1">
              
         
               <input type="text" class="d-none" name="idUsuarioEditado" value="{$id}">
        </div>     
             <button type="submit" class="btn btn-primary">Editar Usuario</button> 
        
    </form>
 </slide>
{include 'templates/footer.tpl'}