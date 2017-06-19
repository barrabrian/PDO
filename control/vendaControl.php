<?php
require_once '../dao/vendaDAO.php';
require_once '../model/venda.php';
class VendaControl{
  private $dao=null;
  private $acao=null;

  function __construct(){
    $this->acao=isset($_POST["acao"])?$_POST["acao"]:$_GET["acao"];
    $this->dao=new VendaDao();
    $this->verificaAcao();
  }

  function verificaAcao(){
    switch ($this->acao) {
      case 1:
        $this->preparaVenda();
      break;
    }
  }

  function preparaVenda(){
    echo "fora";
    if (!isset($_SESSION["idVenda"])) {
      echo "dentro";
      if($this->dao->criarVenda()){
        $this->dao->criarCarrinho();
      }
    }
    header("Location: ../view/nota.php");
  }

}

new VendaControl();

 ?>
