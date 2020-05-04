<?php
	$acao = 'recuperar';
	require 'controller.php';
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Lista Tarefas</title>

		<link rel="stylesheet" href="assets/style/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="assets/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="novaTarefa.php">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />

								<?php if(isset($tarefas)) {?>
									<?php foreach($tarefas as $indices => $tarefa) {?>

									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-9" id='<?php echo $tarefa->id ?>'>
											<?php echo "$tarefa->tarefa ($tarefa->status)" ?>
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" 
											onclick="remove(<?php echo $tarefa->id ?>, 'todasTarefas')"></i>
											<i class="fas fa-edit fa-lg text-info" 
												onclick="update(<?php echo $tarefa->id ?>, '<?php echo $tarefa->tarefa?>', 'todasTarefas')">
											</i>
											<i class="fas fa-check-square fa-lg text-success"
											onclick="status(<?php echo $tarefa->id ?>, 'todasTarefas')"></i>
										</div>
									</div>

									<?php } ?>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src='assets/script/script.js'></script>
	</body>
</html>