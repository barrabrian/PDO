<?php
  include 'cabecalho.php';
  require_once '../dao/produtoDao.php';
  $o=new ProdutoDao();
  $produtos=$o->listaGeral();
 ?>
 <div class="table-title">
 <h3>Produtos</h3>
 </div>
 <br>
 <table class="table-fill">
 <thead>
 <tr>
 <th class="text-left">Código</th>
 <th class="text-left">Descrição</th>
 <th class="text-left">Valor (R$)</th>
 <th class="text-left">Validade</th>
  <th colspan="2" class="text-left">Gerenciar</th>
 </tr>
 </thead>
 <tbody class="table-hover">
<?php
  foreach ($produtos as $produto) {
 ?>
<tr>
<td class="text-left"><?php echo $produto["idProduto"] ?></td>
<td class="text-left"><?php echo $produto["descricaoProduto"] ?></td>
<td class="text-left"><?php echo $produto["valorProduto"] ?></td>

<?php
$data = date("d",strtotime($produto["validade"]));
$data .= "<span style='color:blue;font-weight: 700'>/</span>";
$data .= date("m",strtotime($produto["validade"]));
$data .= "<span style='color:blue;font-weight: 700'>/</span>";
$data .= date("Y",strtotime($produto["validade"]));
 ?>
<td class="text-left"><?php echo $data ?></td>

<td class="text-left"><a href="../control/produtoControl.php?acao=2&id=<?php echo $produto["idProduto"] ?>"><img src="startup-demo-master/Developer/common-files/icons/Pencil@2x.png" width="35" height="35"></a></td>
<td class="text-left"><a href="../control/produtoControl.php?acao=3&id=<?php echo $produto["idProduto"] ?>"><img src="startup-demo-master/Developer/common-files/icons/magic-wand@2x.png" width="35" height="35"></a></td>
</tr>
<?php
}
?>
</tbody>
</table>
<?php
  include 'rodape.php';
 ?>
