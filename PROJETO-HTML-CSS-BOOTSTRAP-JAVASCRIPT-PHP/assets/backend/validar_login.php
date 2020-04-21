<?php
   // Iniciando a sessão
   session_start();
   // Para validar o usuário caso exista, ou seja, se existir vai ser true
   $usuario_valido = false;
   // Informações do usuário
   $usuario_id = null;
   $usuario_id_perfil = null;
   // Array usada como 'banco de dados', porque ainda não aprendi a usar o MySQL
   $usuarios = array(
      array('id' => 1, 'id_perfil' => 0, 'email' => 'adm@teste.com', 'senha' => '1234'),
      array('id' => 2, 'id_perfil' => 0, 'email' => 'adm1@teste.com', 'senha' => '1234'),
      array('id' => 3, 'id_perfil' => 1, 'email' => 'jose@teste.com', 'senha' => '1234'),
      array('id' => 4, 'id_perfil' => 1, 'email' => 'maria@teste.com', 'senha' => '1234'),
   );
   // Verificando se o acesso do usuário é valido e é existente no 'banco de dados'
   foreach($usuarios as $user) {
      if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
         $usuario_valido = true;
         $usuario_id = $user['id'];
         $usuario_id_perfil = $user['id_perfil'];
      }
   }
   // Encaminhando o usuário para a sessão home ou informando que o usuário é invalido
   if($usuario_valido == true) {
      /* Enviando informações para a sessão */
      $_SESSION['autenticado'] = 'SIM';
      $_SESSION['id'] = $usuario_id;
      $_SESSION['id_perfil'] = $usuario_id_perfil;
      header('Location: ../../home.php');
   } else {
      $_SESSION['autenticado'] = 'NAO';
      header('Location: ../../index.php?erro=1');
   }
?>