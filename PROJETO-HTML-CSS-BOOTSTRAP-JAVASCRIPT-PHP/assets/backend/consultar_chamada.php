<?php 
   // Criando a array para resgatar todas as chamadas
   $chamadas = array();

   // abrindo o arquivo.hd
   $arquivo = fopen('assets/backend/arquivo.hd', 'r');
   // Lendo o arquivo e adicionando na array
   // feof teste pelo fim de um arquivo retorna false caso tiver linha e retorna true caso não tiver
   while(!feof($arquivo)) {
      // Recuperando linha
      $registro = fgets($arquivo);
      // Adicionando a linha na array
      $chamadas[] = $registro;
   }
   // Fechando arquivo
   fclose($arquivo);
?>