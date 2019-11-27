{include 'templates/header.tpl'}
  <slide>
     <table class="pedidos_tabla">
        <tr>
          <td>Usuario</td>
          <td>Permiso</td>
          <td>Editar</td>
          <td>Borrar</td>
        </tr>
    {foreach  from=$usuarios item=$usuario}
        <tr>
          <td>{$usuario->usuario}</td>
           <td>{$usuario->permiso}</td>
            <td><a href="editarUsuario/{$usuario->usuario}" class="btn btn-primary">Editar</a>
            <td><a href="borrarUsuario/{$usuario->id_usuario}" class="btn btn-primary">Borrar</a>
        </tr>
        {/foreach}
        </table>
    </slide>

    {include 'templates/footer.tpl'}


