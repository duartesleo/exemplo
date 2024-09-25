<?php

require_once ('../src/model/user.php');
session_start();
$user = new User();
$usuarios = $user->listUser();

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

    <div class="container mt-4">
    <?php include('mensagem.php') ?>
      <div class="row">
        <div class="card">
          <div class="card-header">
            <h4>Lista de Usuarios <a href="cadastra-usuario.php" class="btn btn-primary float-end">Cadastrar Usuario</a></h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                  if(mysqli_num_rows($usuarios) > 0){
                    foreach($usuarios as $usuario){
                
                ?>
                <tr>
                  <td><?= $usuario['id'] ?></td>
                  <td><?= $usuario['nome'] ?></td>
                  <td><?= $usuario['email'] ?></td>
                  <td>
                    <a href="usuario-view.php/?id=<?php echo $usuario['id'] ?>" class="btn btn-secondary btn-sm">Visualizar</a>
                    <a href="editar-usuario.php/?id=<?php echo $usuario['id'] ?>" class="btn btn-success btn-sm">Editar</a>
                    <form action="/aulalogin2/config/acoes.php" method="POST" class="d-inline">
                        <button onclick="return confirm('Você deseja excluir mesmo?')" 
                        type="submit" 
                        name="deleta_usuario" value="<?= $usuario['id']; ?>" 
                        class="btn btn-danger btn-sm">
                        Excluir </button>
                    </form>
                  </td>
                </tr>
                <?php 
                    }
                  }else{  
                    echo '<h5>Nenhum Usuário encontrado</h5>';
                  }
                
                ?>
              </tbody>

            </table>

          </div>

        </div>

      </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>