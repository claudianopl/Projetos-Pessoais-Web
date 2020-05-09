<?php
require "backend/conexao.php";
require "backend/dadosDashboard.php";
require "backend/serviceDB.php";

// Explorando os dados enviado na competencia
$competencia = explode('-', $_POST['competencia']);
$ano = $competencia[0];
$mes = $competencia[1];
$dia = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

// Iniciando o DadosDashboard e atribuindo os valores da filtragem de data
$dashboard = new DadosDashboard();
$dashboard->__set('dataInicio', $ano.'-'.$mes.'-01');
$dashboard->__set('dataFim', $ano.'-'.$mes.'-'.$dia);

// Iniciando a conexão com o banco de dados
$conexao = new Conexao();

// Iniciando e enviando os dados para o serviceDB
$serviceDB = new ServiceDB($conexao, $dashboard);
// Executando as funções do serviceDB
$dashboard->__set('numeroVendas', $serviceDB->getNumeroVendas());
$dashboard->__set('totalVendas', $serviceDB->getTotalVendas());
$dashboard->__set('clientesAtivos', $serviceDB->getClientesAtivos());
$dashboard->__set('clienteInativos', $serviceDB->getClientesInativos());
$dashboard->__set('reclamacoes', $serviceDB->getReclamacoes());
$dashboard->__set('elogios', $serviceDB->getElogios());
$dashboard->__set('sugestoes', $serviceDB->getSugestoes());
$dashboard->__set('despesas', $serviceDB->getDespesas());

// Enviando o obj dashboard em json para a requiição ajax
echo json_encode($dashboard);
?>