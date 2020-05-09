// Solicitando as informações ajax e efeutando as mudanças nos dados dashboard
$('#competencia').on('change', e => {
  let competencia = $(e.target).val()
  
  // Enviando solicitação para o php
  $.ajax({
    type: 'POST',
    url: 'controller.php',
    data: `competencia=${competencia}`, // x-www-form-urlencoded
    dataType: 'json', // Solicitando dados em arquivo json
    success: dados => {
      // Imprimindo no html os dados da requisição
      $('#numeroVendas').html(dados.numeroVendas)
      $('#totalVendas').html(dados.totalVendas)
      $('#clientesAtivos').html(dados.clientesAtivos)
      $('#clienteInativos').html(dados.clienteInativos)
      $('#reclamacoes').html(dados.reclamacoes)
      $('#elogios').html(dados.elogios)
      $('#sugestoes').html(dados.sugestoes)
      $('#despesas').html(dados.despesas)

    },
    error: erro => {
      console.log(erro)
    }
  })
})