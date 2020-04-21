<?php
   // Iniciar a sessão
   session_start();
   // Destruindo as informações da sessão
   session_destroy();
   // Enviando o usuário para a página de login, para destruir a sessão
   header('Location: ../../index.php');
?>