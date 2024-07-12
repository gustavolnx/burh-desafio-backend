# API BURH

Esta é uma API RESTful para cadastro de vagas de emprego e candidatura de usuários, desenvolvida utilizando Laravel.

## Requisitos

-   PHP >= 7.3
-   Composer
-   Banco de dados SQLite (ou qualquer outro banco SQL suportado pelo Laravel)

## Instalação

1. Clone o repositório:

    ```sh
    git clone https://github.com/seu-usuario/job-api.git
    cd job-api
    ```

2. Instale as dependências do Composer:

    ```sh
    composer install
    ```

3. Copie o arquivo de exemplo `.env` e configure as variáveis de ambiente:

    ```sh
    cp .env.example .env
    ```

4. Gere a chave da aplicação:

    ```sh
    php artisan key:generate
    ```

5. Configure o arquivo `.env` para usar o banco de dados SQLite. No arquivo `.env`:

    ```env
    DB_CONNECTION=sqlite
    DB_DATABASE=/caminho/para/seu/database.sqlite
    ```

6. Crie o arquivo de banco de dados SQLite:

    ```sh
    touch database/database.sqlite
    ```

7. Execute as migrações para criar as tabelas no banco de dados:

    ```sh
    php artisan migrate
    ```

8. (Opcional) Popule o banco de dados com dados de exemplo:

    ```sh
    php artisan db:seed
    ```

9. Inicie o servidor de desenvolvimento:

    ```sh
    php artisan serve
    ```

## Testes

Para executar os testes de unidade e de integração, utilize o seguinte comando:

```sh
php artisan test
```

## Rotas da API

GET /api/empresas

POST /api/empresas

GET /api/empresas/{id}

PUT /api/empresas/{id}

DELETE /api/empresas/{id}

GET /api/usuarios

POST /api/usuarios

GET /api/usuarios/{id}

PUT /api/usuarios/{id}

DELETE /api/usuarios/{id}

GET /api/usuarios/{id}/vagas

GET /api/vagas

POST /api/vagas

GET /api/vagas/{id}

PUT /api/vagas/{id}

DELETE /api/vagas/{id}

POST /api/vagas/{id}/candidatar
