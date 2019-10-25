<html>

<head>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
  <title>{$titulo}</title>
</head>
<body>
  <contenedor>
    <logo><img src="images/logo.png" alt="El Azuleño" class="logo"></logo>
    <navbar>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="mostrarHome">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="mostrarPedidos">Pedidos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="mostrarProductos">Productos</a>
                </li>
              </ul>
            {include 'templates/login.tpl'}
            </div>
          </nav>
        </navbar>