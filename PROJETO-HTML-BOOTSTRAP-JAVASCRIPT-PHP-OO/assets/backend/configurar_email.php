<?php
  // Executando na index.php
  class Mensagem {
    // Criando as váriaveis para enviar o email
    private $nome = null;
    private $email = null;
    private $assunto = null;
    private $mensagem = null;
    // Método set para dar valor aos atributos da classe
    public function __set($atributo, $valor) { 
      $this->$atributo = $valor;
    }
    // Método get para retornar os valores dos atributos da classe
    public function __get($atributo) {
      return $this->$atributo;
    }
    /* Método de validação do email para retornar se o email que desejo enviar possui algum error.
    Se possuir, ele vai informar através da variavel erro, qual será o error que o usuário esta tendo.*/
    public function validarEmail() {
      if(empty($this->nome) || empty($this->email) || !(filter_var($this->email, FILTER_VALIDATE_EMAIL)) || empty($this->mensagem)) {
        $erro = 0;
        if(empty($this->nome)) {
          $erro = 1;
        } if(!(filter_var($this->email, FILTER_VALIDATE_EMAIL))) {
          $erro = 2;
        } if(empty($this->assunto)) {
          $erro = 3;
        } if(empty($this->mensagem)) {
          $erro = 4;
        }
        return $erro;
      } else if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        $erro = 0;
      }
    }
  }
  $mensagem = new Mensagem();
  $mensagem->__set('nome', $_POST['nome']);
  $mensagem->__set('email', $_POST['email']);
  $mensagem->__set('assunto', $_POST['assunto']);
  $mensagem->__set('mensagem', $_POST['mensagem']);
  $erro = $mensagem->validarEmail();
  // Informando na url para ser tratado no JavaScript o erro que está sendo executado.
  if($erro != 0) {
    switch($erro) {
      case 1:
        header("Location: ../../index.php?erro=1");
        break;
      case 2:
        header("Location: ../../index.php?erro=2");
        break;
      case 3:
        header("Location: ../../index.php?erro=3");
        break;
      case 4:
        header("Location: ../../index.php?erro=4");
        break;
    }
  }
  // Recrutando as informações do email.
  $nome_usuario = $mensagem->__get('nome');
  $email_usuario = $mensagem->__get('email');
  $assunto_usuario = $mensagem->__get('assunto');
  $mensagem_usuario = $mensagem->__get('mensagem');
  // Criando o corpo do email.
  $corpo = "<strong><h2>$assunto_usuario</h2></strong><br>";
  $corpo .= "$mensagem_usuario<br><br>";
  $corpo .= "<br><br><strong>Nome: </strong>$nome_usuario";
?>