// Executando na index.php
// Capturando url
let url = new URL(window.location)
// Capturando o valor do erro
const error = parseInt(url.searchParams.get("erro"))
// Adicionando a div card para usar o display block
let card = document.getElementById('card')
// Adicionando a div card-erro para informar o error
let cardError = document.getElementById('card-error')
// Tratando o erro
if(error) {
  switch(error) {
    case 1:
      card.className = 'card d-block'
      cardError.innerHTML = 'Erro: Nome não informado.'
      break;
    case 2:
      card.className = 'card d-block'
      cardError.innerHTML = 'Erro: E-mail invalido.'
      break;
    case 3:
      card.className = 'card d-block'
      cardError.innerHTML = 'Erro: Assunto não informado.'
      break;
    case 4:
      card.className = 'card d-block'
      cardError.innerHTML = 'Erro: Mensagem não informada.'
      break;
    }
}
