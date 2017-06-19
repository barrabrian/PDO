<?php
require_once '../control/conexao.php';
class VendedorDao{
  private $con;
  private $stm;

  function __construct(){
    $o=new Conexao();
    $this->con=$o->Conectar();
  }

  function buscaId($id){
    $sql = "SELECT * FROM vendedor WHERE idVendedor = ".$id;
    $busca = $this->con->query($sql);
    $dados = $busca->fetch(PDO::FETCH_ASSOC);
    return $dados;
  }

  function listaGeral(){
    $sql = "SELECT * FROM vendedor ORDER BY nomeVendedor ASC";
    $busca = $this->con->query($sql);
    $dados = $busca->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
  }

  function inserir(Vendedor $v){
    $sql="insert into vendedor(nomeVendedor) values (?)";
    $this->stm=$this->con->prepare($sql);
    $var=$v->getNome();
    $this->stm->bindParam(1,$v->getNome());
    $this->stm->execute();
  }

  function verificaAcesso(Vendedor $v){
    $retorno = false;
    $sql="SELECT * FROM vendedor WHERE idVendedor=? and senha=?";
    $stm= $this->con->prepare($sql);
    $id= $v->getId();
    echo $id;
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

}
 ?>
