<html>
	<head>
		<meta charset="utf-8" />
    	<title>App Suporte</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>

	<body>

		<div class="container">  

			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="assets/img/logo.png" alt="" width="72" height="72">
				<h2>App Suporte</h2>
				<p class="lead">Seu app de envio de e-mail para suporte!</p>
			</div>
			<div id='card' class='d-none'>
				<div id='card-error' class='card-body text-center text-danger'></div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card-body font-weight-bold">
						<form action='assets/backend/enviar_email.php' method='post'>
							<div class="form-group">
								<label for="para">Nome</label>
								<input name='nome' type="text" class="form-control" id="nome" placeholder="Nome Sobrenome">
							</div>
							<div class="form-group">
								<label for="para">Email</label>
								<input name='email' type="email" class="form-control" id="email" placeholder="exemplo@dominio.com">
							</div>
							<div class="form-group">
								<label for="assunto">Assunto</label>
								<input name='assunto' type="text" class="form-control" id="assunto" placeholder="Assundo">
							</div>

							<div class="form-group">
								<label for="mensagem">Mensagem</label>
								<textarea name='mensagem' class="form-control" id="mensagem" placeholder='Mensagem'></textarea>
							</div>

							<button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
						</form>
					</div>
				</div>
			</div>
    </div>
		<script src="assets/script/script.js"></script>
	</body>
</html>