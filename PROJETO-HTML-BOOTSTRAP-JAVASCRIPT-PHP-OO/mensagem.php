<?php
  // iniciando sesão
	session_start();
	if(!isset($_SESSION)) {
		header('Location: index.php');
	}
?>

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
        
          <?php 
            if($_SESSION['codigo_status'] == 1) {
          ?>

              <div class='container'>
                <h1 class='display-4 text-success mb-4'>Sucesso</h1>
                <p><?php echo $_SESSION['mensagem']; ?></p>
                <a href='index.php' class='btn btn-sucess bg-success btn-lg mt-4 text-white'>Voltar</a>
              </div>

          <?php } ?>

          <?php 
            if($_SESSION['codigo_status'] == 2) {
          ?>

              <div class='container'>
                <h1 class='display-4 text-danger mb-4'>Ops!</h1>
                <p><?php echo $_SESSION['mensagem']; ?></p>
                <a href='index.php' class='btn btn-sucess bg-danger btn-lg mt-4 text-white'>Voltar</a>
              </div>

          <?php } ?>

				</div>
			</div>
    </div>
		<script src="assets/script/script.js"></script>
	</body>
</html>