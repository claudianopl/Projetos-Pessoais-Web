// Capturando url para ser tratada
let url =  new URL(window.location);

let acao = url.searchParams.get('acao')

if(acao == 'incluso') {
  let divMensagem = document.getElementById('mensagem')
  let lblMensagem = document.createElement('h5')

  divMensagem.className = "bg-success pt-2 text-white d-flex justify-content-center"
  lblMensagem.innerHTML='Tarefa inserida com sucesso!'

  mensagem.appendChild(lblMensagem)
}

function update(id, desc, local) {
  let form = document.createElement('form')
  if(local == 'todasTarefas') {
    form.action = 'controller.php?acao=update&local=1'
  } else if (local == 'index') {
    form.action = 'controller.php?acao=update&local=2'
  }
  form.method = 'post'
  form.className = 'row'

  let inputTarefa = document.createElement('input')
  inputTarefa.type = 'text'
  inputTarefa.name = 'tarefa'
  inputTarefa.value = desc
  inputTarefa.className = 'col-9 form-control'

  let inputId = document.createElement('input')
  inputId.type = 'hidden'
  inputId.name = 'id'
	inputId.value = id

  let button = document.createElement('button')
  button.type = 'submite'
  button.className = 'col-3 btn btn-info'
  button.innerHTML = 'Atualizar'

  // incluir o inputTarefa no form
  form.appendChild(inputTarefa)
  // incluir o inputId no form 
  form.appendChild(inputId)
  // incluir o button no form
  form.appendChild(button)

  // Selecionar tarefa para colocar o form
  let tarefa = document.getElementById(id)

  // Limpar texto da tarefar para incusão do form
  tarefa.innerHTML = ''

  // inclusão do form na página
  // tarefa.insertBefore(form, nó_da_tarefa)
  tarefa.insertBefore(form, tarefa[0])
}
function remove(id, local) {
  if(local == 'todasTarefas') {
    location.href = 'controller.php?acao=remove&local=1&id='+id
  } else if (local == 'index') {
    location.href = 'controller.php?acao=remove&local=2&id='+id
  }
}
function status(id, local) {
  if(local == 'todasTarefas') {
    location.href = 'controller.php?acao=status&local=1&id='+id
  } else if (local == 'index') {
    location.href = 'controller.php?acao=status&local=2&id='+id
  }
}