<?php

include ('./config/conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){

  if(strlen($_POST['email']) == 0){
    echo "Informe seu email";
  }else if(strlen($_POST['senha']) == 0){
    echo "Informe seu senha";
  }else{

    $mysqli = new Conn();

    $email = $mysqli->getConnection()->real_escape_string($_POST['email']);
    $senha =  $mysqli->getConnection()->real_escape_string($_POST['senha']);

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $sql_query =  $mysqli->getConnection()->query($sql) or die;
    $qtd = $sql_query->num_rows;

    if($qtd == 1){
      $usuario = $sql_query->fetch_assoc();
      if(password_verify($senha, $usuario['senha'])){
      
      if(!isset($_SESSION)){
        session_start();
      }

      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nome'] = $usuario['nome'];
      $_SESSION['aula'] = 'Aula legal!';

      header('Location: views/painel.php');
    }
    echo 'Email ou senha invalidos';
    }else{
      echo "Email ou senha invalidos.";
    }



  }


  

}
?>