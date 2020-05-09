<?php
Class ServiceDB {
  public $conexao;
  public $dashboard;

  public function __construct(Conexao $conexao, DadosDashboard $dashboard) {
    $this->conexao = $conexao->conectar();
    $this->dashboard = $dashboard;
  }

  public function getNumeroVendas() {
    $query = '
    select
      count(*) as numeroVendas
    from
      tb_vendas
    where
      data_venda between :dataInicio and :dataFinal
    ';
    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(':dataInicio', $this->dashboard->__get('dataInicio'));
    $stmt->bindValue(':dataFinal', $this->dashboard->__get('dataFim'));
    $stmt->execute();
    // Retornando para o obj dadosDashboard os resultados do n de vendas no mês
    return $stmt->fetch(PDO::FETCH_OBJ)->numeroVendas;
  }

  public function getTotalVendas() {
    $query = '
    select
      sum(total) as totalVendas
    from
      tb_vendas
    where
      data_venda between :dataInicio and :dataFinal
    ';
    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(':dataInicio', $this->dashboard->__get('dataInicio'));
    $stmt->bindValue(':dataFinal', $this->dashboard->__get('dataFim'));
    $stmt->execute();
    // Retornando para o obj dadosDashboard os resultados do total de vendas no mês
    return $stmt->fetch(PDO::FETCH_OBJ)->totalVendas;
  }

  public function getClientesAtivos() {
    $query = '
    select
      count(*) as clientesAtivos
    from 
      tb_clientes
    where
      cliente_ativo = 1
    ';

    $stmt = $this->conexao->prepare($query);
    $stmt->execute();
    // Retornando para o obj dadosDashboard os resultado de cliente ativos
    return $stmt->fetch(PDO::FETCH_OBJ)->clientesAtivos;
  }

  public function getClientesInativos() {
    $query = '
    select
      count(*) as clientesInativos
    from 
      tb_clientes
    where
      cliente_ativo = 0
    ';

    $stmt = $this->conexao->prepare($query);
    $stmt->execute();
    // Retornando para o obj dadosDashboard os resultado de cliente inativos
    return $stmt->fetch(PDO::FETCH_OBJ)->clientesInativos;
  }

  public function getReclamacoes() {
    $query = '
    select
      count(*) as reclamacoes
    from
      tb_contatos
    where
      tipo_contato = 1
    ';
    $stmt = $this->conexao->prepare($query);
    $stmt->execute();
    // Retornando para o obj dadosDashboard os resultado de reclamações
    return $stmt->fetch(PDO::FETCH_OBJ)->reclamacoes;
  }

  public function getElogios() {
    $query = '
    select
      count(*) as elogios
    from
      tb_contatos
    where
      tipo_contato = 2
    ';
    $stmt = $this->conexao->prepare($query);
    $stmt->execute();
    // Retornando para o obj dadosDashboard os resultado de elogios
    return $stmt->fetch(PDO::FETCH_OBJ)->elogios;
  }

  public function getSugestoes() {
    $query = '
    select
      count(*) as sugestoes
    from
      tb_contatos
    where
      tipo_contato = 2
    ';
    $stmt = $this->conexao->prepare($query);
    $stmt->execute();
    // Retornando para o obj dadosDashboard os resultado de sugestões
    return $stmt->fetch(PDO::FETCH_OBJ)->sugestoes;
  }

  public function getDespesas() {
    $query = '
    select
      sum(total) as totalDespesas
    from
      tb_despesas
    where
      data_despesa between :dataInicio and :dataFinal
    ';
    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(':dataInicio', $this->dashboard->__get('dataInicio'));
    $stmt->bindValue(':dataFinal', $this->dashboard->__get('dataFim'));
    $stmt->execute();
    // Retornando para o obj dadosDashboard os resultados do total de depesas no mês
    return $stmt->fetch(PDO::FETCH_OBJ)->totalDespesas;
  }
}

?>