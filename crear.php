<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

require __DIR__ . '/vendor/autoload.php';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';

$options = array(
  'cluster' => 'us2',
  'useTLS' => true
);
$pusher = new Pusher\Pusher(
  'a571373e043b11e8b596',
  'ffab7b685288f28cfbc3',
  '1020012',
  $options
);

$data = $nombre;
// $data['message'] = 'hello world';
$pusher->trigger('my-channel', 'my-event', $data);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <title>Ejemplo con Pusher</title>
  </head>
  <body class="fondo">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <h3 class="bg-primary text-white text-center m-5 p-3 rounded">
            Libreria PUSHER
          </h3>
          <div class="card mx-auto" style="width: 300px;">
            <div class="card-body">
              <form method="POST">
                <div class="form-group">
                  <label>Nombre</label>
                  <input
                    type="text"
                    class="form-control"
                    name="nombre"
                    placeholder="Nombre.."
                  />
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
