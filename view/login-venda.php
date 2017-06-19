<?php include 'cabecalho.php'; ?>
<div style="display:flex; flex-direction:row; justify-content: center; height:100%;" >
  <form style="display:flex; flex-direction:column; justify-content: center; align-items:center; height:100%;" action="../control/vendedorControl.php" method="post">
    <input class="popup-input" type="number" name="idVendedor" placeholder="Código">
    <input class="popup-input" type="password" name="senha" placeholder="Senha">
    <br>
    <input type="hidden" name="acao" value="2">
    <input class="btn-popup" type="submit" value="Autenticar">
  </form>
</div>
<?php include 'rodape.php'; ?>
