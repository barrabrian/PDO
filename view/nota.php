<?php
  session_start();
  include 'cabecalho.php';
  echo "Vendedor:". $_SESSION["idVendedor"]." <br>";
  echo "Venda n˚:". $_SESSION["idVenda"]."<br><hr>";
 ?>
<?php include 'rodape.php'; ?>
