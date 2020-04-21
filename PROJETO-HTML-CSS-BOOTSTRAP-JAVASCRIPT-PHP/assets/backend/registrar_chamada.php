<?php
   // Iniciar a sessão
   session_start();
   // Obtendo dados do formulário
   $titulo = str_replace('#', '-', $_POST['titulo']);
   $categoria = str_replace('#', '-', $_POST['categoria']);
   $descricao = str_replace('#', '-', $_POST['descricao']);

   // Gerando o texto para ser armazenado
   $texto = $_SESSION['id'] . '#' . $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;
   /* Criei um arquivo .hd para simular o banco de dados, já que ainda não tenho
   conhecimentos em MySQL*/

   // Abrindo ou criando o arquivo, para escritura
   $arquivo = fopen('arquivo.hd', 'a');
   // Escrevendo no arquivo
   fwrite($arquivo, $texto);
   // Fechando o arquivo
   fclose($arquivo);
   // Enviando para a página de abrir chamada
   header('Location: ../../abrir_chamado.php?cadastro=sucesso')
?>