<?php
require_once '../dao/produtoDAO.php';
require_once '../model/produto.php';
class ProdutoControl{
  private $dao=null;
  private $produto=null;
  private $acao=null;

  function __construct(){
    $this->acao=$_REQUEST["acao"];
    $this->produto=new Produto();
    $this->dao=new ProdutoDao();
    $this->verificaAcao();
  }

  function verificaAcao(){
    switch ($this->acao) {
      case 1:
        $this->preparaInsercao();
      break;
      case 2:
        $this->preparaExclusao();
      break;
      case 3:
        if(isset($_GET["id"])){
          $this->preparaAlteracao();
        }else{
          $this->enviarAlteracao();
        }
      break;
    }
  }

  function enviarAlteracao(){
    $this->produto->setDescricao($_POST["descricao"]);
    $this->produto->setValor($_POST["valor"]);
    $validade = $_POST["ano"]."-".$_POST["mes"]."-".$_POST["dia"];
    $this->produto->setValidade($validade);
    $this->produto->setId($_POST["id"]);
    $this->dao->alterar($this->produto);
  }

  function preparaAlteracao(){
    $produto=$this->dao->buscaId($_GET["id"]);
    $this->produto->setDescricao($produto["descricaoProduto"]);
    $this->produto->setValor($produto["valorProduto"]);
    $this->produto->setValidade($produto["validade"]);
    $this->produto->setId($produto["idProduto"]);
    require_once '../view/frmAltProduto.php';
    $o= new FrmAltProduto();
    $o->criaFormulario($this->produto);

  }

  function preparaExclusao(){
    $produto=$this->dao->buscaId($_GET["id"]);
    $this->produto->setDescricao($produto["descricaoProduto"]);
    $this->produto->setValor($produto["valorProduto"]);
    $this->produto->setValidade($produto["validade"]);
    $this->produto->setId($produto["idProduto"]);
    if ($this->dao->excluir($this->produto)){
      header("Location: ../view/listaGeralProdutos.php");
    }else {
      echo "Exclusão Obstruida! Há Algum Problema.";
    }
  }

  function preparaInsercao(){
    $this->produto->setDescricao($_POST["descricao"]);
    $this->produto->setValor($_POST["valor"]);
    $data=$_POST["ano"]."-".$_POST["mes"]."-".$_POST["dia"];
    $this->produto->setValidade($data);
    $this->dao->inserir($this->produto);
  }

}

new ProdutoControl();

 ?>
