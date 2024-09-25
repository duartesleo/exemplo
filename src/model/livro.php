<?php
require_once ('../config/conexao.php');

class Livro
{

  private int $id;
  private String $titulo;
  private String $autor;
  private String $editora;
  private int $ano;
  private String $categoria;

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
   * Get the value of titulo
   */ 
  public function getTitulo()
  {
    return $this->titulo;
  }

  /**
   * Set the value of titulo
   *
   * @return  self
   */ 
  public function setTitulo($titulo)
  {
    $this->titulo = $titulo;

    return $this;
  }

  /**
   * Get the value of autor
   */ 
  public function getAutor()
  {
    return $this->autor;
  }

  /**
   * Set the value of autor
   *
   * @return  self
   */ 
  public function setAutor($autor)
  {
    $this->autor = $autor;

    return $this;
  }

  /**
   * Get the value of editora
   */ 
  public function getEditora()
  {
    return $this->editora;
  }

  /**
   * Set the value of editora
   *
   * @return  self
   */ 
  public function setEditora($editora)
  {
    $this->editora = $editora;

    return $this;
  }

  /**
   * Get the value of ano
   */ 
  public function getAno()
  {
    return $this->ano;
  }

  /**
   * Set the value of ano
   *
   * @return  self
   */ 
  public function setAno($ano)
  {
    $this->ano = $ano;

    return $this;
  }

  /**
   * Get the value of categoria
   */ 
  public function getCategoria()
  {
    return $this->categoria;
  }

  /**
   * Set the value of categoria
   *
   * @return  self
   */ 
  public function setCategoria($categoria)
  {
    $this->categoria = $categoria;

    return $this;
  }

  function createBook($titulo, $autor, $editora, $ano, $categoria){
    $mysqli = new Conn();
    $titulo = $mysqli->getConnection()->real_escape_string($titulo);
    $autor = $mysqli->getConnection()->real_escape_string($autor);
    $editora = $mysqli->getConnection()->real_escape_string($editora);
    $ano = $mysqli->getConnection()->real_escape_string($ano);
    $categoria = $mysqli->getConnection()->real_escape_string($categoria);

    $sql = "INSERT INTO livro (titulo, autor, editora, ano, categoria) VALUES 
    ('$titulo', '$autor', '$editora', '$ano', '$categoria')";

    return $mysqli->getConnection()->query($sql);
  }

  function listBook(){
    $mysqli = new Conn();
    $sql = "SELECT * FROM livro";
    return $mysqli->getConnection()->query($sql); 
  }

  function findById($id){
    $mysqli = new Conn();
    $sql = "SELECT * FROM livro WHERE id=" . $id;
    return $mysqli->getConnection()->query($sql);
  }


}
