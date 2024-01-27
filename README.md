# Laravel 10 & Vue 3 App com TypeScript

Ambiente de desenvolvimento Docker para Laravel 10 com:

- Nginx
- PostgreSQL
- PHP8.2
- Vue
- Node

## Instalação

- Copie o arquivo `.env`: `cp .env.example .env`
- Configure as variaveis de ambiente no arquivo `.env`
- Rode o comando: `docker-compose up --build -d`
- Rode o container em modo bash: `docker exec -it Laravel_php /bin/sh`
- Dentro do container rode ss seguintes comandos:
- Dependencias do composer: `composer install`
- Gere a application key: `php artisan key:generate`
- Gere a chave de autenticação: `php artisan jwt:secret`
- Rode as migrations: `php artisan migrate --seed`
- Agora você pode rodar o projeto no seu browswer na seguinte URL: `http://localhost:80`


