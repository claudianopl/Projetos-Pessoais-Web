# Projeto Web - Dashboard

Ferramentas: HTML5, CSS3, Bootstrap, JavaScript(jQuery/Ajax), PHP, MYSQL

Descrição: A finalidade desse projeto foi treinar os conhecimentos adquiridos com a framework jQuery e Ajax, logo fiz esse pequeno projeto de dashboard com requisições ajax usando a framework jQuery, para treinar e praticar esses conhecimentos. 
O projeto funciona da seguinte forma:
  - Existem o arquivo index.html, onde é a página principal do projeto, nele só existe os menus para ser feita as solicitações ajax
  - Existem os arquivos dashboard.html, documentacao.html e suporte.html, esses arquivos são solicitados pelo usuário através do Ajax com o jQuery.
  - Existem o arquivo controller.php que é o arquivo público do PHP que se relaciona com os arquivos do back-end que seriam arquivos privados da aplicação.
  - Dentro da pasta back-end existe os arquivos: conexao.php (responsável por manter conexão com o banco de dados MySQL), controllerPrivate.php (responsável por fazer as solicitações de dados, a partir dos objetos criado em serviceDB.php e colocar esses dados no objeto encontrado no arquivo dadosDashboard.php), serviceDB.php (funciona para fazer as solicitações de dados no MySQL e depois esses dados é retornado para o arquivo e objeto dadosDashboard.php), dadosDashboard.php (funciona como um molde para ser injetado os dados solicitados pelo arquivo serviceDB.php e assim ser enviado como um arquivo json para o arquivo scriptDashboard.js).
  - Dentro da pasta script existe os arquivos: requisicoes.js (responsável por fazer as requisições ajax usando jQuery do dashboard, documentação e suporte para a index.html), scriptDashboard.js (responsável por fazer as requisições ajax usando jQuery dos dados do back-end).

Data: 09/05/2020

# Contato

Claudiano Pereira de Lima - claudianopereira047@gmail.com

# GIF
![alt text](https://media.giphy.com/media/d6QLWh7RsPcpCjTVXc/giphy.gif)

# screenshots

# Dashboard - Janeiro
![alt text](https://i.imgur.com/1ieUS8I.png)

# Dashboard - Fevereiro
![alt text](https://i.imgur.com/R5tCA5y.png)

# Dashboard - Março
![alt text](https://i.imgur.com/xJ43BZv.png)

# Ajuda - Documentação
![alt text](https://i.imgur.com/VRbOcqf.png)

# Ajuda - Suporte
![alt text](https://i.imgur.com/sfZj0tP.png)