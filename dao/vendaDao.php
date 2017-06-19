<?php
session_start();
require_once '../control/conexao.php';
class VendaDao{
  private $con;
  private $stm;

  function __construct(){
    $o=new Conexao();
    $this->con=$o->Conectar();
  }

  function buscaId($id){
    $sql = "SELECT * FROM venda WHERE idVenda = ".$id;
    $busca = $this->con->query($sql);
    $dados = $busca->fetch(PDO::FETCH_ASSOC);
    return $dados;
  }

  function listaGeral(){
    $sql = "SELECT * FROM venda ORDER BY idVenda ASC";
    $busca = $this->con->query($sql);
    $dados = $busca->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
  }

  function criarVenda(){
    $retorno=false;
    $sql="insert into venda(dataVenda) values (now())";
    if ($this->con->query($sql)) {
      $retorno=true;
      $_SESSION["idVenda"] = $this->con->lastInsertId();
    }
    return $retorno;
  }

  function verificaAcesso(Vendedor $v){
    $retorno = false;
    $sql="SELECT * FROM vendedor WHERE idVendedor=? and senha=?";
    $stm= $this->con->prepare($sql);
    $id= $v->getIdVendedor();
    $senha= $v->getSenha();
    $stm->bindValue(1,$id);
    $stm->bindValue(2,$senha);
    $stm->execute();
    $result= $stm->fetch();
    if (count($result)) {
      $retorno=true;
    }
    return $retorno;
  }

  function criarCarrinho(){
    $_SESSION["carrinho"]= array("idProduto" => array(), "quantidade" => array());
  }

}
 ?>
