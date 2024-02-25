# 🚀 Projeto de Aplicação com Banco de Dados em Docker

![Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MariaDB](https://img.shields.io/badge/MariaDB-003545?style=for-the-badge&logo=mariadb&logoColor=white)

Este projeto consiste em uma aplicação web e um banco de dados que se comunicam entre si, ambos contêinerizados usando Docker. A aplicação possui uma página com um formulário onde é possível inserir um nome e um email.

## 📁 Estrutura do Projeto

O projeto é dividido em duas pastas principais:

- 🌐 `app`: Esta pasta contém a aplicação web. Ela inclui um Dockerfile que define como a imagem Docker da aplicação é construída. A imagem Docker pode ser encontrada no Docker Hub [aqui](https://hub.docker.com/repository/docker/brunaminusso/php-apache/general).
- 🗄️ `db`: Esta pasta contém o banco de dados. Ela também inclui um Dockerfile que define como a imagem Docker do banco de dados é construída. A imagem Docker pode ser encontrada no Docker Hub [aqui](https://hub.docker.com/repository/docker/brunaminusso/mariadb/general).

## 🚀 Como usar

1. Certifique-se de que o Docker e o Docker Compose estão instalados em sua máquina.
2. Clone este repositório.
3. Navegue até o diretório do projeto.
4. Execute o comando `docker-compose build`. Isso irá construir as imagens Docker para a aplicação e o banco de dados usando os Dockerfiles fornecidos e as definições no arquivo docker-compose.yml.
5. Após a construção das imagens, inicie os contêineres Docker com o comando `docker-compose up`.
6. A aplicação estará disponível em um navegador web no endereço http://localhost:8080.

## 🎯 Funcionalidade da Aplicação

A aplicação apresenta uma página com um formulário onde os usuários podem inserir seu nome e email. Quando o formulário é enviado, os dados são inseridos no banco de dados.

## 📚 Visualizando os dados do banco de dados

Para visualizar os dados no banco de dados, siga estas etapas:

### Opção 1:

1. Instale um cliente de banco de dados MySQL. Por exemplo, você pode baixar e instalar o [MySQL Workbench](https://dev.mysql.com/downloads/workbench/) ou [DBeaver](https://dbeaver.io/).

2. Abra o cliente do banco de dados e crie uma nova conexão de banco de dados. Forneça as seguintes informações de conexão do banco de dados:

   - Hostname: `localhost`
   - Port: `3307`
   - Username: `root`
   - Password: (deixe em branco, já que o projeto permite uma senha de root vazia)

### Opção 2:
Se você preferir usar a linha de comando para visualizar os dados do banco de dados, siga estas etapas:

1. Primeiro, você precisa instalar o cliente MySQL.

2. Em seguida, você pode se conectar ao banco de dados usando o cliente MySQL com o seguinte comando:
    ```bash
    mysql -h 127.0.0.1 -P 3307 -u root -p
    ```
    Quando solicitado, pressione Enter para a senha, já que o projeto permite uma senha de root vazia.

Depois de estabelecer a conexão, você deve ser capaz de ver o esquema do banco de dados. Você pode listar todos os bancos de dados com o comando `SHOW DATABASES;`.

Para visualizar os dados, primeiro selecione o banco de dados com o comando `USE user;`. Em seguida, você pode executar consultas SQL para visualizar os dados, como `SELECT * FROM users;`.

