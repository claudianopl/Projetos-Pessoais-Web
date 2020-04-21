// Executando na index.php
// Capiturando a url
let url = new URL(window.location);
// Extraindo o erro
let valor = url.searchParams.get("erro");
// Adicionando a div onde vou informa se aconteceu um erro
let loginInvalido = document.getElementById('loginInvalido')
// Se o erro for 1, foi erro de usuário invalido
// Se o erro for 2, foi tentativa de acesso a páginas que só é permitida se estiver logado
if(valor == 1) {
   loginInvalido.innerHTML = 'Usuário ou senha inválido(s)'
} else if(valor == 2) {
   loginInvalido.innerHTML = 'Por favor, efetuar o login para possuir acesso.'
}

// Executando no abrir_chamada.php
// Extraindo o erro
let cadastro = url.searchParams.get("cadastro")
// Referênciando a div
let sucesso = document.getElementById('sucesso')
// Verificando
if(cadastro == 'sucesso') {
   sucesso.innerHTML = 'Chamada aberta com sucesso!'
}

