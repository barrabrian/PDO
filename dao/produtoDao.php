<?php
require_once '../control/conexao.php';
class ProdutoDao{
  private $con;
  private $stm;

  function __construct(){
    $o=new Conexao();
    $this->con=$o->Conectar();
  }

  function alterar(Produto $p){
    $sql="UPDATE produtos SET descricaoProduto = '".$p->getDescricao()."', valorProduto = '".$p->getValor()."', validade = '".$p->getValidade()."' WHERE idProduto=".$p->getId();
    $this->con->query($sql);
    header("Location: ../view/listaGeralProdutos.php");
  }

  function buscaId($id){
    $sql = "SELECT * FROM produtos WHERE idProduto = ".$id;
    $busca = $this->con->query($sql);
    $dados = $busca->fetch(PDO::FETCH_ASSOC);
    return $dados;
  }

  function excluir(Produto $p){
    $retorno = false;
    $sql="DELETE FROM produtos WHERE idProduto = ?";
    $this->stm=$this->con->prepare($sql);
    $this->stm->bindParam(1,$p->getId());
    if ($this->stm->execute()) {
      $retorno = true;
    }
    return $retorno;
  }

  function listaGeral(){
    $sql = "SELECT * FROM produtos ORDER BY descricaoProduto ASC";
    $busca = $this->con->query($sql);
    $dados = $busca->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
  }

  function inserir(Produto $p){
    $sql="insert into produtos(descricaoProduto,valorProduto,validade) values (?,?,?)";
    $this->stm=$this->con->prepare($sql);
    $var=$p->getDescricao();
    $this->stm->bindParam(1,$p->getDescricao());
    $this->stm->bindParam(2,$p->getValor());
    $this->stm->bindParam(3,$p->getValidade());
    $this->stm->execute();
  }

}
 ?>
