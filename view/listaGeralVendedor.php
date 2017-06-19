<?php
  include 'cabecalho.php';
  require_once '../dao/vendedorDao.php';
  $o=new VendedorDao();
  $vendedores=$o->listaGeral();
 ?>
 <div class="table-title">
 <h3>Vendedor</h3>
 </div>
 <br>
 <table class="table-fill">
 <thead>
 <tr>
 <th class="text-left">Código</th>
 <th class="text-left">Nome</th>
 <th class="text-left" colspan="2">Gerenciar</th>
 </tr>
 </thead>
 <tbody class="table-hover">
<?php
  foreach ($vendedores as $vendedor) {
 ?>
<tr>
<td class="text-left"><?php echo $vendedor["idVendedor"] ?></td>
<td class="text-left"><?php echo $vendedor["nomeVendedor"] ?></td>
<td class="text-left"><a href="../control/vendedorControl.php?acao=2&id=<?php echo $vendedor["idVendedor"] ?>"><img src="startup-demo-master/Developer/common-files/icons/Pencil@2x.png" width="35" height="35"></a></td>
<td class="text-left"><a href="../control/vendedorControl.php?acao=3&id=<?php echo $vendedor["idVendedor"] ?>"><img src="startup-demo-master/Developer/common-files/icons/magic-wand@2x.png" width="35" height="35"></a></td>
</tr>
<?php
}
?>
</tbody>
</table>
<?php
  include 'rodape.php';
 ?>
