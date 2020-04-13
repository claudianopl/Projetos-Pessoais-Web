// Classe para agrupar os dados do usuário
class Despesa {
	//
	constructor(dia, mes, ano, tipo, descricao, valor) {
		this.dia = dia
		this.mes = mes
		this.ano = ano
		this.tipo = tipo
		this.descricao = descricao 
		this.valor = valor
	}

	validarDados() {
		/* validando os dados, caso todos os campos estejam preenchidos vou retorna verdadeiro
		com isso posso apresentar o modal de sucesso */
		for(let i in this) {
			if(this[i] == undefined || this[i] == null || this[i] == '') {
				return false
			}
		}
		return true
	}
}


// Armazenamento de dados
class Bd {
	/* Criando o id caso ele não exista, para sempre poder adicionar novos dados 
	e não substituir os dados já existente. */
	constructor() {
		let id = localStorage.getItem('id')
		if(id === null) {
			localStorage.setItem('id', 0)
		}
	}
	// Criando uma nova id
	getProximoId() {
		let proximoId = localStorage.getItem('id')
		return parseInt(proximoId) + 1
	}

	// Adicionando os dados no localStorage
	setItem(dados) {
		// Enviando para criar uma nova id
		let id = this.getProximoId()
		// Adicionando ao localStorage
		localStorage.setItem(id, JSON.stringify(dados))
		// Atualizando o valor da key id
		localStorage.setItem('id', id)
	}

	// Recuperando todos os dados do localStorage dentro de uma Array
	recuperarTodosRegistros() {
		let dados = Array()

		let id = localStorage.getItem('id')
		for(let i = 0; i<=id; i++) {
			let dado = JSON.parse(localStorage.getItem(i))
			// Caso o dado seja vazio, eu pulo aquele elemnto
			if(dado === null) {
				continue
			}
			// Colocando o id dentro da array para fazer a possível remoção
			dado.id=i
			// Caso contario, vou adicionar na Array dados
			dados.push(dado)
		}
		// Organizando os dados da array, para ficar com uma melhor visualização
		dados.sort((a, b) => {
			if(parseInt(a.ano) < parseInt(b.ano)) return -1
			else if(parseInt(a.ano) > parseInt(b.ano)) return 1

			if(parseInt(a.mes) < parseInt(b.mes)) return -1
			else if(parseInt(a.mes) > parseInt(b.mes)) return 1

			if(parseInt(a.dia) < parseInt(b.dia)) return -1
			else if(parseInt(a.dia) > parseInt(b.dia)) return 1
			else return 0
		})
		// Retorna a array
		return dados
	}

	// Pesquisar no banco localStorage
	pesquisar(dado) {
		// Criando uma array dos dados filtrados
		let dadosFiltrados = Array()

		// Recuperando todos os dados
		dadosFiltrados = this.recuperarTodosRegistros()

		// Verificando as opções de filtragem
			// Dia
		if(dado.dia != '') {
			dadosFiltrados = dadosFiltrados.filter(d => d.dia == dado.dia)
		}
			// Mes
		if(dado.mes != '') {
			dadosFiltrados = dadosFiltrados.filter(d => d.mes == dado.mes)
		}
			// Ano
		if(dado.ano != '') {
			dadosFiltrados = dadosFiltrados.filter(d => d.ano == dado.ano)
		}
			// Tipo
		if(dado.tipo != '') {
			dadosFiltrados = dadosFiltrados.filter(d => d.tipo == dado.tipo)
		}
			// Descricao
		if(dado.descricao != '') {
			dadosFiltrados = dadosFiltrados.filter(d => d.descricao == dado.descricao)
		}
			// Valor
		if(dado.valor != '') {
			dadosFiltrados = dadosFiltrados.filter(d => d.valor == dado.valor)
		}

		// Retornando os dados filtrados
		return dadosFiltrados
	}

	// Removendo dado
	remover(id) {
		localStorage.removeItem(id)
	}
}

let bd = new Bd()


// Adquirindo os dados de despesas do usuário
function cadastrarDespesas() {
	let dia = document.getElementById('dia').value
	let mes = document.getElementById('mes').value
	let ano = document.getElementById('ano').value
	let tipo = document.getElementById('tipo').value
	let descricao = document.getElementById('descricao').value.toUpperCase()
	let valor = document.getElementById('valor').value

	// Enviando para uma classe de cadastro para organizar e validar
	let novaDespesa = new Despesa(dia, mes, ano, tipo, descricao, valor)

	// Criando as variável para o modal
	let modalCor = document.getElementById('modal-cor')
	let modalTitulo = document.getElementById('modal-titulo')
	let modalConteudo = document.getElementById('modal-conteudo')
	let modalBtn = document.getElementById('modal-btn')


	// Validação de dados para que não haja o cadastramento de dados faltando informações
	if(novaDespesa.validarDados()) {
		// Enviar para o banco de dados
		bd.setItem(novaDespesa)

		// Configurando modal
			// Cor da fonte
		modalCor.className = 'modal-header text-success' 
			// Titulo
		modalTitulo.innerHTML = 'Registro inserido com sucesso'
			// Conteudo
		modalConteudo.innerHTML = 'Despesa foi cadastrada com sucesso'
			// Botão
		modalBtn.className = 'btn btn-success'
		modalBtn.innerHTML = 'Voltar'

		// dialog
 		$('#modalRegistrarDespesas').modal('show')
	} else {
		// Configurando modal
			// Cor da fonte
		modalCor.className = 'modal-header text-danger' 
			// Titulo
		modalTitulo.innerHTML = 'Erro na inclusão do registro'
			// Conteudo
		modalConteudo.innerHTML = 'Erro na gravação, verifique se todos os dados foram preenchidos corretamente'
			// Botão
		modalBtn.className = 'btn btn-danger'
		modalBtn.innerHTML = 'Voltar e Corrigir'

		// dialog
 		$('#modalRegistrarDespesas').modal('show')
	}
}


// Carregando as despesas no body, ou seja, assim que a página é recarregada
function carregaListaDespesas(despesas = Array(), filtro = false){
	if(despesas.length == 0 && filtro == false) {
		// Recupera todos os registros do banco de dados
		despesas = bd.recuperarTodosRegistros()
	}
	
	// Adicionando o tbody na variável listaDespesas
	let listaDespesas = document.getElementById('listaDespesas')
	listaDespesas.innerHTML = ''


	despesas.forEach(function(d) {
		// Criando a tr = linha
		let linha = listaDespesas.insertRow()

		// Criando as td = colunas
			// Data
		linha.insertCell(0).innerHTML = `${d.dia}/${d.mes}/${d.ano}`
			// Tipo
		linha.insertCell(1).innerHTML = d.tipo
			// Descrição
		linha.insertCell(2).innerHTML = d.descricao
			// Valor
		linha.insertCell(3).innerHTML = `${d.valor}R$`

		// Botão de exclusão
		let btn = document.createElement('button')
			// Colocando como um botão e alterando a cor, com as classes do bootstrap 4 
		btn.className = 'btn btn-danger'
			// Colocando um icone no botão aparti do site fontawesome
		btn.innerHTML = '<i class="fas fa-times"></i>'
			// Adicionando um id a cada botão
		btn.id = `id_despesa_${d.id}`
			// Adicionando uma consequência ao botão
		btn.onclick = function() {
			// Recuperando apenas o id do dado
			let id = this.id.replace('id_despesa_', '')
			// Enviando para remover o dado
			bd.remover(id)
			// Atualizando a página já com os dados removidos
			window.location.reload()
		}
		linha.insertCell(4).append(btn)
	})
}

// Filtrando dados
function pesquisarDespesas() {
	let dia = document.getElementById('dia').value
	let mes = document.getElementById('mes').value
	let ano = document.getElementById('ano').value
	let tipo = document.getElementById('tipo').value
	let descricao = document.getElementById('descricao').value.toUpperCase()
	let valor = document.getElementById('valor').value

	// Enviando para uma classe de cadastro para organizar e validar
	let pesquisaDespesa = new Despesa(dia, mes, ano, tipo, descricao, valor)

	// Enviando para o banco de dados
	registrosRecuperados = bd.pesquisar(pesquisaDespesa)

	// Enviando para o carregarListaDespesas para ser colocado no html
	this.carregaListaDespesas(registrosRecuperados, true)
}


function carregaDespesaMensal() {
	let carregarMensal = bd.recuperarTodosRegistros()

	// Soma dos mes
	let somaJan = 0, somaFev = 0, somaMar = 0, somaAbr = 0, somaMai = 0, somaJun = 0, somaJul = 0, somaAgo = 0, somaSet = 0, somaOut = 0, somaNov = 0, somaDez = 0;

	// Percorrendo a array carregarMensal para efetuar as devidas somas
	carregarMensal.forEach(function(d) {
		if(d.mes == '01') {
			let valor = parseInt(d.valor)
			somaJan += valor
		} else if (d.mes == '02') {
			let valor = parseInt(d.valor)
			somaFev += valor
		} else if (d.mes == '03') {
			let valor = parseInt(d.valor)
			somaMar += valor
		} else if (d.mes == '04') {
			let valor = parseInt(d.valor)
			somaAbr += valor
		} else if (d.mes == '05') {
			let valor = parseInt(d.valor)
			somaMai += valor
		} else if (d.mes == '06') {
			let valor = parseInt(d.valor)
			somaJun += valor
		} else if (d.mes == '07') {
			let valor = parseInt(d.valor)
			somaJul += valor
		} else if (d.mes == '08') {
			let valor = parseInt(d.valor)
			somaAgo += valor
		} else if (d.mes == '09') {
			let valor = parseInt(d.valor)
			somaSet += valor
		} else if (d.mes == '10') {
			let valor = parseInt(d.valor)
			somaOut += valor
		} else if (d.mes == '11') {
			let valor = parseInt(d.valor)
			somaNov += valor
		} else if (d.mes == '12') {
			let valor = parseInt(d.valor)
			somaDez += valor
		}
	})
	document.getElementById('0').innerHTML = `<strong>${somaJan}R$</strong>`
	document.getElementById('1').innerHTML = `<strong>${somaFev}R$</strong>`
	document.getElementById('2').innerHTML = `<strong>${somaMar}R$</strong>`
	document.getElementById('3').innerHTML = `<strong>${somaAbr}R$</strong>`
	document.getElementById('4').innerHTML = `<strong>${somaMai}R$</strong>`
	document.getElementById('5').innerHTML = `<strong>${somaJun}R$</strong>`
	document.getElementById('6').innerHTML = `<strong>${somaJul}R$</strong>`
	document.getElementById('7').innerHTML = `<strong>${somaAgo}R$</strong>`
	document.getElementById('8').innerHTML = `<strong>${somaSet}R$</strong>`
	document.getElementById('9').innerHTML = `<strong>${somaOut}R$</strong>`
	document.getElementById('10').innerHTML = `<strong>${somaNov}R$</strong>`
	document.getElementById('11').innerHTML = `<strong>${somaDez}R$</strong>`
}