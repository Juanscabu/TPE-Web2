<?php

class TpeView {

    public function mostrarProductos($productos) {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="css/style.css">
            <title>Lista de Tareas</title>
        </head>
        <body>
            <div class="container">
                <ul class="list-group mt-4">';
                foreach($productos as $producto) {
                    $html .= '<li class="tarea list-group-item';
                    $html .= '">' . $producto->nombre;
                }
                $html .= '</ul>
            </div>
        </body>
        </html>';

        echo $html;
    }

    public function showError($msgError) {
        echo "<h1>ERROR!</h1>";
        echo "<h2>{$msgError}</h2>";
    }

}
