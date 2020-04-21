<?php
   // Iniciando a sessão
   session_start();
   // Identificando se o acesso é válido ou inválido
   if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
      header('Location: index.php?erro=2');
   }
?>