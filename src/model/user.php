<?php

require_once('../config/conexao.php');

class User
{


  private int $id;
  private String $nome;
  private String $email;
  private String $password;





  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of nome
   */
  public function getNome()
  {
    return $this->nome;
  }

  /**
   * Set the value of nome
   *
   * @return  self
   */
  public function setNome($nome)
  {
    $this->nome = $nome;

    return $this;
  }

  /**
   * Get the value of email
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of password
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @return  self
   */
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  function createUser($nome, $email, $senha)
  {
    $mysqli = new Conn();

    $nome = $mysqli->getConnection()->real_escape_string($nome);
    $email = $mysqli->getConnection()->real_escape_string($email);
    $senha = $mysqli->getConnection()->real_escape_string($senha);

    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user(nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    return $mysqli->getConnection()->query($sql);
  }

  function listUser()
  {
    $mysqli = new Conn();
    $sql = "SELECT * FROM user";
    return $mysqli->getConnection()->query($sql);
  }

  function findById($id)
  {
    $mysqli = new Conn();
    $sql = "SELECT * FROM user WHERE id=" . $id;
    return $mysqli->getConnection()->query($sql);
  }

  function editarUser($id, $nome, $email, $senha)
  {
    $mysqli = new Conn();

    $nome = $mysqli->getConnection()->real_escape_string($nome);
    $email = $mysqli->getConnection()->real_escape_string($email);
    $senha = $mysqli->getConnection()->real_escape_string($senha);

    if (!empty($senha)) {
      $senha = password_hash($senha, PASSWORD_DEFAULT);
      $sql = "UPDATE user SET nome='$nome', email = '$email', senha = '$senha' WHERE id = '$id'";
      return $mysqli->getConnection()->query($sql);
    }

    $sql = "UPDATE user SET nome='$nome', email='$email' WHERE id = '$id'";
    return $mysqli->getConnection()->query($sql);
  }

  function deleteUser($id)
  {
    $mysqli = new Conn();
    $sql = "DELETE FROM user WHERE id=" . $id;
    return $mysqli->getConnection()->query($sql);
  }
}
