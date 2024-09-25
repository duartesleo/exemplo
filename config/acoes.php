<?php

include('../src/model/user.php');
include('../src/model/livro.php');
session_start();

if (isset($_POST['cadastra_usuario'])) {

  if (strlen($_POST['email']) == 0) {
    $_SESSION['mensagem'] = 'Usuario não foi cadastrado';
    header('Location: ../views/lista-usuario.php');
  } else if (strlen($_POST['senha']) == 0) {
    $_SESSION['mensagem'] = 'Usuario não foi cadastrado';
    header('Location: ../views/lista-usuario.php');
  } else if (strlen($_POST['nome']) == 0) {
    $_SESSION['mensagem'] = 'Usuario não foi cadastrado';
    header('Location: ../views/lista-usuario.php');
  } else {
    $user = new User();
    $result = $user->createUser($_POST['nome'], $_POST['email'], $_POST['senha']);
    if ($result == 1) {
      $_SESSION['mensagem'] = 'Usuario cadastrado com sucesso';
      unset($_SESSION['cadastra_usuario']);
      header('Location: ../views/lista-usuario.php');
    } else {
      $_SESSION['mensagem'] = 'Usuario não foi cadastrado';
      unset($_SESSION['cadastra_usuario']);
      header('Location: ../views/lista-usuario.php');
    }
  }
}


if (isset($_POST['cadastra_livro'])) {

  if (strlen($_POST['titulo']) == 0) {
    $_SESSION['mensagem'] = 'Livro não foi cadastrado';
    header('Location: ../views/lista-usuario.php');
  } else if (strlen($_POST['autor']) == 0) {
    $_SESSION['mensagem'] = 'Livro não foi cadastrado';
    header('Location: ../views/lista-usuario.php');
  } else if (strlen($_POST['editora']) == 0) {
    $_SESSION['mensagem'] = 'Livro não foi cadastrado';
    header('Location: ../views/lista-usuario.php');
  } else if (strlen($_POST['ano']) == 0) {
    $_SESSION['mensagem'] = 'Livro não foi cadastrado';
    header('Location: ../views/lista-usuario.php');
  } else if (strlen($_POST['categoria']) == 0) {
    $_SESSION['mensagem'] = 'Livro não foi cadastrado';
    header('Location: ../views/lista-usuario.php');
  } else {
    $livro = new Livro();
    $result = $livro->createBook($_POST['titulo'], $_POST['autor'], $_POST['editora'], $_POST['ano'], $_POST['categoria']);
    if ($result == 1) {
      $_SESSION['mensagem'] = 'Livro cadastrado com sucesso';
      unset($_SESSION['cadastra_livro']);
      header('Location: ../views/lista-livro.php');
    } else {
      $_SESSION['mensagem'] = 'Livro não foi cadastrado';
      unset($_SESSION['cadastra_livro']);
      header('Location: ../views/lista-livro.php');
    }
  }
}

if (isset($_POST['editar_usuario'])) {

  $user = new User();
  $result = $user->editarUser($_POST['id'], $_POST['nome'], $_POST['email'], $_POST['senha']);

  if ($result == 1) {
    $_SESSION['mensagem'] = 'Usuario editado com sucesso';
    unset($_SESSION['editar_usuario']);
    header('Location: ../views/lista-usuario.php');
  } else {
    $_SESSION['mensagem'] = 'Usuario não foi editado';
    unset($_SESSION['editar_usuario']);
    header('Location: ../views/lista-usuario.php');
  }
}

if (isset($_POST['deleta_usuario'])) {

  $user = new User();
  $result = $user->deleteUser($_POST['deleta_usuario']);

  if ($result == 1) {
    $_SESSION['mensagem'] = 'Usuario delado com sucesso';
    unset($_SESSION['deleta_usuario']);
    header('Location: ../views/lista-usuario.php');
  } else {
    $_SESSION['mensagem'] = 'Usuario não foi deletado';
    unset($_SESSION['deleta_usuario']);
    header('Location: ../views/lista-usuario.php');
  }
}
