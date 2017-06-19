<?php
class Venda{
  private $idVenda;
  private $dataVenda;
  private $valor;

  public function getIdVenda(){
    return $this->id;
  }

  public function setIdVenda($id){
    $this->id = $id;
  }

  public function getDataVenda(){
    return $this->nome;
  }

  public function setDataVenda($nome){
    $this->nome = $nome;
  }

  public function getValor(){
    return $this->nome;
  }

  public function setValor($nome){
    $this->nome = $nome;
  }
}
 ?>
