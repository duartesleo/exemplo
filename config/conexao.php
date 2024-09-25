<?php

class Conn
{
  private $usuario = 'root';
  private $senha = '';
  private $database = 'login';
  private $host = 'localhost';

  public function getConnection()
  { 
    try {
      $mysqli = new mysqli($this->host, $this->usuario, $this->senha, $this->database);
      return $mysqli;
    } catch (Exception $e) {
      echo "Desculpa, erro interno, verifique o banco de dados!<br>";
      exit();
    }
  }
}
