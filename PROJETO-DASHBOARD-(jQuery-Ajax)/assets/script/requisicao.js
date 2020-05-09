$(document).ready(() => {
   /* Carregando a dashboard.html por requisição ajax, assim que a página for
   inicializada */
  $('#pagina').load('dashboard.html')

  // Carregando a documentação.html por requisição ajax, quando for solicitada
  $("#documentacao").on('click', () => {
    $('#pagina').load('documentacao.html')
  })
  
  // Carregando o suporte.html por requisição ajax, quando for solicitada
  $("#suporte").on('click', () => {
    $('#pagina').load('suporte.html')
  })

  // Carregando a dashboard.html por requisição ajax, quando for solicitada
  $('#dashboard').on('click', () => {
    $('#pagina').load('dashboard.html')
  })

})