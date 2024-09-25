<?php

require_once ('../src/model/livro.php');
session_start();
$livro = new Livro();
$livros = $livro->listBook();

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
            <h4>Lista de Livros <a href="cadastra-livro.php" class="btn btn-primary float-end">Cadastrar Livro</a></h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Titulo</th>
                  <th>Autor</th>
                  <th>Editora</th>
                  <th>Ano</th>
                  <th>Categoria</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                  if(mysqli_num_rows($livros) > 0){
                    foreach($livros as $livro){
                
                ?>
                <tr>
                  <td><?= $livro['id'] ?></td>
                  <td><?= $livro['titulo'] ?></td>
                  <td><?= $livro['autor'] ?></td>
                  <td><?= $livro['editora'] ?></td>
                  <td><?= $livro['ano'] ?></td>
                  <td><?= $livro['categoria'] ?></td>
                  <td>
                    <a href="livro-view.php/?id=<?=$livro['id'];?>" class="btn btn-secondary btn-sm">Visualizar</a>
                    <a href="#" class="btn btn-success btn-sm">Ediar</a>
                    <form action="" method="POST" class="d-inline">
                        <button type="submit" name="deleta_usuario" value="1" class="btn btn-danger btn-sm">Excluir </button>
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