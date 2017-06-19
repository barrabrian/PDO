<?php
class Produto{
  private $id;
  private $descricao;
  private $valor;
  private $validade;

  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getDescricao(){
    return $this->descricao;
  }

  public function setDescricao($descricao){
    $this->descricao = $descricao;
  }

  public function getValor(){
    return $this->valor;
  }

  public function setValor($valor){
    $this->valor = $valor;
  }

  public function getValidade(){
    return $this->validade;
  }

  public function setValidade($validade){
    $this->validade = $validade;
  }


}
 ?>
