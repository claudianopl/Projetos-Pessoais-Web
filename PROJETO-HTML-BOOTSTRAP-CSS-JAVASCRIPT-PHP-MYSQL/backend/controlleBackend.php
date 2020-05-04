<?php
  require "backend/conexao.php";
  require "backend/modeloTarefa.php";
  require "backend/tarefaService.php";
  // Tratando a informação de ação
  $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

  if($acao == 'insert') {
    // Criar o obj tarefa com os dados da tarefa
    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);
    // Chamar a conexao
    $conexao = new Conexao();
    // Enviando para tarefaService e inserindo ao banco de dados
    $tarefaService = new tarefaService($conexao, $tarefa);
    $tarefaService->insert();
    header('Location: novaTarefa.php?acao=incluso');
  } else if($acao == 'recuperar') {
    // Criar o obj tarefa para poder enviar para tarefaService
    $tarefa = new Tarefa();
    // Chamar a conexao
    $conexao = new Conexao();
     // Enviando para tarefaService e inserindo ao banco de dados
     $tarefaService = new tarefaService($conexao, $tarefa);
     $tarefas = $tarefaService->search();
  } else if($acao == 'update') {
    // Criar o obj tarefa para poder enviar para tarefaService
    $tarefa = new Tarefa();
    // Atribuindo os valores de id e dados da tarefa
		$tarefa->__set('tarefa', $_POST['tarefa']);
		$tarefa->__set('id', $_POST['id']);
		// Conetando ao banco de dados
    $conexao = new Conexao();
    // Enviando ao tarefaService
		$tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->update();

    if ($_GET['local']==1) {
      header('Location: todasTarefas.php');
    } else if ($_GET['local']==2) {
      header('Location: index.php');
    }
  } else if($acao == 'remove') {
    // Criar o obj tarefa para poder enviar para tarefaService
    $tarefa = new Tarefa();
    // Atribuindo os valores de id e dados da tarefa
    $tarefa->__set('id', $_GET['id']);
    // Conetando ao banco de dados
    $conexao = new Conexao();
    // Enviando ao tarefaService
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->remove();
    if($_GET['local'] == 1) {
      header('Location: todasTarefas.php');
    } else if($_GET['local'] == 2) {
      header('Location: index.php');
    }
  } else if($acao == 'status') {
    // Criar o obj tarefa para poder enviar para tarefaService
    $tarefa = new Tarefa();
    // Atribuindo os valores de id e dados da tarefa
    $tarefa->__set('id', $_GET['id']);
    $tarefa->__set('id_status', 2);
    // Conetando ao banco de dados
    $conexao = new Conexao();
    // Enviando ao tarefaService
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->status();
    if($_GET['local'] == 1) {
      header('Location: todasTarefas.php');
    } else if($_GET['local'] == 2) {
      header('Location: index.php');
    }
  }
?>