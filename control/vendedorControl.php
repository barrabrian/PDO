<?php
require_once '../dao/vendedorDAO.php';
require_once '../model/vendedor.php';
class VendedorControl{
  private $dao=null;
  private $produto=null;
  private $acao=null;

  function __construct(){
    $this->acao=isset($_POST["acao"])?$_POST["acao"]:$_GET["acao"];
    $this->vendedor=new Vendedor();
    $this->dao=new VendedorDao();
    $this->verificaAcao();
  }

  function verificaAcao(){
    switch ($this->acao) {
      case 1:
        $this->preparaInsercao();
      break;
      case 2:
        $this->controleAcesso();
      break;
    }
  }

  function preparaInsercao(){
    $this->vendedor->setNome($_POST["nome"]);
    $this->dao->inserir($this->vendedor);
  }

  function controleAcesso(){
    session_start();
    $o=new Vendedor();
    $o->setId($_POST["idVendedor"]);
    $o->setSenha($_POST["senha"]);
    if ($this->dao->verificaAcesso($o)) {
      $_SESSION["idVendedor"]=$o->getId();
      header("Location: vendaControl.php?acao=1");
    }else {
      header("Location: ../view/login_venda.php?erro=1");
    }
  }

}

new VendedorControl();

 ?>
