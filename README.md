# A Arca dos Gatos

A Arca dos Gatos é um sistema web voltado para os amantes de gatos, onde os usuários podem explorar e favoritar gatos a partir da [API de gatos](https://thecatapi.com/).  O projeto visa combinar uma experiência de navegação simples com funcionalidades práticas para quem gosta de felinos. Para mais detalhes sobre o fluxo de utilização da plataforma, acesse o Guia da Arca dos Gatos no arquivo pdf na raiz do repositório.

## Como rodar o projeto
### Passo 1
O projeto foi desenvolvido utilizando o Laragon, que é um ambiente de desenvolvimento portátil PHP para o Windows. Portanto, o primeiro passo é instalar o Laragon em sua máquina. Também é necessário instalar o composer para gerenciar as dependências Laravel/PHP do projeto e o Node.JS para dependências front-end utilizadas como bibliotecas Javascript.

Laragon - https://laragon.org/download/

Composer - https://getcomposer.org/download/

Node.JS - https://nodejs.org/pt/download/package-manager

### Passo 2
Com o Laragon instalado, você deve clonar o repositório do projeto na pasta www padrão que normalmente fica no endereço C:\laragon\www\ mas você pode conferir e adequar de acordo com o seu local de instalação do Laragon.

### Passo 3 
Crie um novo Banco de Dados MySQL abrindo a interface do Laragon e seguindo o seguinte fluxo:

- Clique no botão Iniciar Tudo para iniciar os serviços Apache e MySQL
- Clique no botão Banco de Dados
- Clique na sessão padrão Laragon.MySQL que é criada por padrão ao iniciar os serviços e depois clique em abrir
- Clique com o botão direito em cima de Laragon.MySQL > Criar novo > Banco de dados

Certifique-se de editar no .env do projeto clonado com as credenciais de acordo com o nome do banco que você criou.

### Passo 4
Instale as dependências do Laravel e do front-end rodando os seguintes comandos:

- composer install
- npm install

### Passo 5
Rode as migrations para criar a estrutura de tabelas do Banco com o seguinte comando:

php artisan migrate

### Passo 6
Clique em Iniciar Tudo no menu do Laragon e o projeto estará rodando. Para acessar você pode clicar com o botão direito na janela do Laragon, na opção www clicar no nome do projeto e ele irá redirecionar para o localhost.
