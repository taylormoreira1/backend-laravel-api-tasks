## Installation:

Requerimentos: PHP 8.0 ou superior, Composer, MySQL

Clone o projeto:

```bash
git clone https://github.com/taylormoreira1/backend-laravel-api-tasks
```

Navegue até a pasta do projeto:

```bash
cd backend-laravel-api-tasks
```

## Utilização via docker:

Faça uma cópia de .env.example para .env e altere as credenciais do banco:

```bash
cp .env.example .env
```

```bash
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=default
DB_USERNAME=laravel
DB_PASSWORD=secret
```

Inicie os contêineres:

```bash
docker-compose up -d
```

Entre no container:

```bash
docker exec -it taylor-app bash
```

Execute o comando composer install:

```bash
composer install
```

Configure a chave do aplicativo:

```bash
php artisan key:generate
```

Execute as migrations do banco de dados:

```bash
php artisan migrate
```

Rodar as seeders execute:

```bash
php artisan db:seed
```

obs: para utilizar algum usuário das seed utilize o email do usuário com a senha "teste12345"

## Endpoint da api

Na raiz do projeto tem uma collection para importar no Postman com todos os endpoints da api: Taks api.postman_collection

# API Documentation:

## Create User

-   **Method:** POST
-   **URL:** http://127.0.0.1:8000/api/register
-   **Headers:**
    -   Content-Type: application/json
    -   Accept: application/json, text/plain, _/_
-   **Body:**
    -   name: string
    -   email: string(email)
    -   password: string
    -   password_confirmation: string

## Auth

### Login | Get Token

-   **Method:** POST
-   **URL:** http://127.0.0.1:8000/api/auth/login
-   **Headers:**
    -   Content-Type: application/json
    -   Accept: application/json
-   **Body:**
    -   email: string(email)
    -   password: string

### User Profile

-   **Method:** GET
-   **URL:** http://127.0.0.1:8000/api/auth/user-profile
-   **Authorization:** Bearer Token

### Refresh Token

-   **Method:** POST
-   **URL:** http://127.0.0.1:8000/api/auth/refresh
-   **Authorization:** Bearer Token

### Logout

-   **Method:** POST
-   **URL:** http://127.0.0.1:8000/api/auth/logout
-   **Authorization:** Bearer Token

## Tasks

### User Tasks

-   **Method:** GET
-   **URL:** http://127.0.0.1:8000/api/tasks/
-   **Authorization:** Bearer Token

### Create Task

-   **Method:** POST
-   **URL:** http://127.0.0.1:8000/api/tasks/
-   **Headers:**
    -   Content-Type: application/json
-   **Body:**
    -   name: string
    -   description: string

### Update Task

-   **Method:** PUT
-   **URL:** http://127.0.0.1:8000/api/tasks/15
-   **Headers:**
    -   Content-Type: application/json
-   **Body:**
    -   name: string
    -   description: string
    -   deadline: datetime

### Delete Task

-   **Method:** DELETE
-   **URL:** http://127.0.0.1:8000/api/tasks/12
-   **Authorization:** Bearer Token


link para o projeto frontend: https://github.com/taylormoreira1/frontend-react-api-tasks

