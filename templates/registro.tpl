{include 'templates/header.tpl'}
  <slide>
     <form method= "POST" action="registrar" class="form" >
        <div class="form-group">
            <label for="username">Usuario</label>
            <input type="username" class="form-control" name="username" id="username"  placeholder="Usuario">
        </div>
        <div  class="form-group">
                 <label for="password">Contraseña</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
      


  </slide>
{include 'templates/footer.tpl'}