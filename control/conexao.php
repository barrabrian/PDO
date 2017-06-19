<?php
require_once '../banco/criaBanco.php';
   class Conexao{
   	 private $con;
   	 function  Conectar(){
      $retorno = null;
   	 	try{
   	 		$pdo = new PDO('mysql:host=localhost;', 'root', '');
   	 	     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   	 	     $banco = new CriaBanco();
   	 	     if($banco->criaBaseDados($pdo)){
   	 	     	$banco->CriaTabelas($pdo);
   	 	     }
           $retorno=$pdo;
   	 	}catch(PDOException $e){
   	 		echo $e->getMessage();

   	 	}
      return $retorno;
   	 }
   }
?>
