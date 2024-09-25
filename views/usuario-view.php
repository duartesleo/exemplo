<?php
require_once('../src/model/user.php');
session_start();

$user = new User();
$usuarios = $user->findById($_GET['id']);

$user = $usuarios->fetch_assoc();

if ($usuarios->num_rows > 0) {
?>


  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body>
    <?php include('nav-bar.php'); ?>

    <div class="container mt-5">
      <div class="row">
        <div class="card">
          <div class="card-header">
            <h4>Usuario <a href="/aulalogin2/views/lista-usuario.php" class="btn btn-primary float-end">Voltar</a></h4>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label>ID</label>
              <p><?php echo $user['id'] ?></p>
            </div>
            <div class="mb-3">
              <label>Nome</label>
              <p><?php echo $user['nome'] ?></p>
            </div>
            <div class="mb-3">
              <label>Email</label>
              <p><?php echo $user['email'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } else { ?>

    <h5>Usuario não encontrado!</h5>

  <?php } ?>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

  </html>