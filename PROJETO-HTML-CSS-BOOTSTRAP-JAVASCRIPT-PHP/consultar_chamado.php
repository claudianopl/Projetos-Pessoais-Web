<?php 
  require_once "assets/backend/permitir_acesso.php";
  require_once "assets/backend/consultar_chamada.php";
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="assets/imagens/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class='navbar-nav'>
        <li class='navbar-item'>
          <a class='nav-link' href='assets/backend/logoff.php'>SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <?php
                foreach($chamadas as $chamada) {
                  // Extraindo os dados para dentro de chamada_dados
                  $chamada_dados = explode('#', $chamada);
                  if($_SESSION['id_perfil'] == 1) {
                    if($_SESSION['id'] != $chamada_dados[0]){
                      continue;
                    }
                  }
                  if(count($chamada_dados) < 3) {
                    continue;
                  }
              ?>
              
              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h3 class="card-title"><?php echo $chamada_dados[1] ?></h3>
                  <h5 class="card-subtitle mb-2 text-muted"><?php echo $chamada_dados[2] ?></h5>
                  <p class="card-text font-weight-bold"><?php echo $chamada_dados[3] ?></p>
                  <p class="card-text"><?php echo $chamada_dados[4] ?></p>
                  <p class="card-text"><?php echo $chamada_dados[5] ?></p>
                </div>
              </div>

              <?php
                }
              ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a href='home.php' class="btn btn-lg btn-warning btn-block">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>