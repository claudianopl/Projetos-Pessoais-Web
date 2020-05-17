# Projeto Web - App Lista de Tarefas

Ferramentas: HTML5, CSS3, Bootstrap, JavaScript, PHP, MYSQL

Descrição: A finalidade desse projeto foi treinar os conhecimentos adquiridos com o MYSQL, resolvi criar um CRUD para treinar esses conhecimentos. A pasta backend, se encontra fora da pasta assets, porque vai ser a pasta privada que não entra no localhost, para os arquivos não serem acessados.
O projeto foi desenvolvido da seguinte forma, existe um arquivo público chamado controller.php que mantém contato com o controlleBackend.php no arquivo privado, o controlleBackend.php é responsável por decidir o que será feito, se o comando é de inserção de dados, retorno de dados, atualização de dados ou remover. Após decidir o comando, ele solicita a execução ao tarefaService.php, que executa o comando. Ao comando ser executado o usuário é redirecionado para a página onde solicitou o comando. O moldeloTarefa.php, é o molde de dados onde usamos para enviar os dados ao arquivo tarefaService.php, já o conexao.php, é feita a conexão com o banco de dados para ser efetuado os comandos do tarefaService.php.
No banco de dados foi criada duas tabelas, uma de tarefas e outra de status que estão vinculadas de 1:N, ou seja, uma tarefa possui um status e um status possui várias tarefas. Com isso podemos alterar o status da tarefa de pendente para realizado.

Data: 04/05/2020

# Contato

Claudiano Pereira de Lima - claudianoplima@hotmail.com

# Screenshot

# Página de inserção
![alt text](https://i.imgur.com/p5JadlJ.png)

# Página de inserção - Inserido com sucesso
![alt text](https://i.imgur.com/p9LLmE2.png)

# Página de visualização todas as tarefas
![alt text](https://i.imgur.com/xDNeHp8.png)

# Atualização da tarefa
![alt text](https://i.imgur.com/eHJNMnu.png)

# Página de visualização tarefas pendentes
![alt text](https://i.imgur.com/0oyGbKg.png)

# Todas as tarefas concluída
![alt text](https://i.imgur.com/m5ro1Xx.png)

