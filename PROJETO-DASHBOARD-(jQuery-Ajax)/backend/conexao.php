<?php
Class Conexao {
  public $host = 'localhost';
  public $dbname = 'dashboard';
  public $user = 'root';
  public $pass = '';

  public function conectar() {
    try {
      $conexao = new PDO("mysql:host=$this->host;dbname=$this->dbname", 
      "$this->user", 
      "$this->pass");
      // Executando o mysql em utf8, já que a comunicação está sendo feita em utf8
      $conexao->exec('set charset set utf8');
      // Retornando a conexão
      return $conexao;

    } catch(PDOException $e) {
      echo '<p>'.$e->getMessege().'</p>';
    }
  }
}
?>