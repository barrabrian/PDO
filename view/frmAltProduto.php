<?php
class FrmAltProduto{
  function criaFormulario(Produto $p){
    include 'cabecalho.php';
?>

<div class="container">
  <!-- Top Navigation -->
  <header class="codrops-header">
    <h1>Cadastro de <span>Produtos</span></h1>
  </header>
  <section>
    <form id="theForm" action="../control/produtoControl.php" class="simform"  method="POST" autocomplete="off">
      <div class="simform-inner">
        <ol class="questions">
          <li>
            <span><label for="q1">Descrição:</label></span>
            <input id="q1" name="descricao" type="text" value="<?php echo $p->getDescricao() ?>" />
          </li>
          <li>
            <span><label for="q2">Valor:</label></span>
            <input id="q2" name="valor" type="text" value="<?php echo $p->getValor() ?>" />
          </li>
          <li>
            <span><label for="q3">Validade:</label></span>
            <?php
                $vet=explode("-", $p->getValidade());
             ?>
            <input id="q2" style="display:inline-block; width:30%" name="dia" type="text" size="3" maxlength="2" value="<?php echo $vet[2] ?>" />/
            <select style="display:inline-block;" name="mes">
              <?php
                  $meses = array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
                  for ($i=0; $i < 12; $i++) {
                    $s=($i+1)==$vet[1]?"selected":"";
                    echo "<option value='".($i+1)."' $s>$meses[$i]</option>";
                  }
               ?>
            </select>/
            <input id="q2" style="display:inline-block;width:30%;" name="ano" type="text" size="5" maxlength="4" value="<?php echo $vet[0] ?>" />
          </li>
        </ol><!-- /questions -->
        <input type="hidden" name="acao" value="3">
        <input type="hidden" name="id" value="<?php echo $p->getId() ?>">
        <button class="submit" type="submit">Alterar</button>
        <div class="controls">
          <button class="next"></button>
          <div class="progress"></div>
          <span class="number">
            <span class="number-current"></span>
            <span class="number-total"></span>
          </span>
          <span class="error-message"></span>
        </div><!-- / controls -->
      </div><!-- /simform-inner -->
      <span class="final-message"></span>
    </form><!-- /simform -->
  </section>
</div><!-- /container -->
<script src="js/classie.js"></script>
<script src="js/stepsForm.js"></script>
<script>
  var theForm = document.getElementById( 'theForm' );

  new stepsForm( theForm, {
    onSubmit : function( form ) {
      // hide form
      classie.addClass( theForm.querySelector( '.simform-inner' ), 'hide' );


      form.submit()
      /*
      AJAX request (maybe show loading indicator while we don't have an answer..)
      */

      // let's just simulate something...
      var messageEl = theForm.querySelector( '.final-message' );
      messageEl.innerHTML = 'Cadastrado!';
      classie.addClass( messageEl, 'show' );
    }
  } );
</script>

<?php
    include 'rodape.php';
  }
}
?>
