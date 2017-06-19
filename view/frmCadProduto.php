<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastro Produto</title>
		<meta name="description" content="Minimal Form Interface: Simplistic, single input view form" />
		<meta name="keywords" content="form, minimal, interface, single input, big form, responsive form, transition" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<!-- Top Navigation -->
			<header class="codrops-header">
				<h1>Cadastro de <span>Produtos</span></h1>
			</header>
			<section>
				<form id="theForm" action="../control/ProdutoControl.php" class="simform"  method="POST" autocomplete="off">
					<div class="simform-inner">
						<ol class="questions">
							<li>
								<span><label for="q1">Descrição:</label></span>
								<input id="q1" name="descricao" type="text"/>
							</li>
							<li>
								<span><label for="q2">Valor:</label></span>
								<input id="q2" name="valor" type="text"/>
							</li>
              <li>
								<span><label for="q3">Validade:</label></span>
								<input id="q2" style="display:inline-block; width:30%" name="dia" type="text" size="3" maxlength="2"/>/
                <select style="display:inline-block;" name="mes">
                  <option value="1">Janeiro</option>
                  <option value="2">Fevereiro</option>
                  <option value="3">Março</option>
                  <option value="4">Abril</option>
                  <option value="5">Maio</option>
                  <option value="6">Junho</option>
                  <option value="7">Julho</option>
                  <option value="8">Agosto</option>
                  <option value="9">Setembro</option>
                  <option value="10">Outubro</option>
                  <option value="11">Novembro</option>
                  <option value="12">Dezembro</option>
                </select>/
                <input id="q2" style="display:inline-block;width:30%;" name="ano" type="text" size="5" maxlength="4"/>
							</li>
						</ol><!-- /questions -->
						<input type="hidden" name="acao" value="1">
						<button class="submit" type="submit">Enviar</button>
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
	</body>
</html>
