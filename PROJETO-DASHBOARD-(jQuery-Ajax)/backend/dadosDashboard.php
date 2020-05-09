<?php
Class DadosDashboard {
  public $dataInicio;
  public $dataFim;
  public $numeroVendas;
  public $totalVendas;
  public $clientesAtivos;
  public $clienteInativos;
  public $reclamacoes;
  public $elogios;
  public $sugestoes;
  public $despesas;

  public function __get($atributo) {
    return $this->$atributo;
  }
  public function __set($atributo, $valor) {
    $this->$atributo = $valor;
    return $this;
  }
}

?>