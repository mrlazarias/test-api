<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Places API

API RESTful para gerenciamento de lugares, desenvolvida com Laravel 12 e PostgreSQL.

## Requisitos

- Docker
- Docker Compose
- Git

## Tecnologias Utilizadas

- PHP 8.3
- Laravel 12
- PostgreSQL 15
- Docker
- Composer

## Estrutura do Projeto

```
.
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── PlaceController.php
│   │   ├── Requests/
│   │   │   └── PlaceRequest.php
│   │   └── Resources/
│   │       └── PlaceResource.php
│   └── Models/
│       └── Place.php
├── database/
│   ├── migrations/
│   │   └── create_places_table.php
│   ├── factories/
│   │   └── PlaceFactory.php
│   └── seeders/
│       └── PlaceSeeder.php
├── tests/
│   └── Feature/
│       └── PlaceApiTest.php
├── docker-compose.yml
└── Dockerfile
```

## Instalação

1. Clone o repositório:
```bash
git clone <url-do-repositorio>
cd places-api
```

2. Configure o ambiente:
```bash
cp .env.example .env
```

3. Inicie os containers:
```bash
docker-compose up -d --build
```

4. Instale as dependências:
```bash
docker-compose exec app composer install
```

5. Gere a chave da aplicação:
```bash
docker-compose exec app php artisan key:generate
```

6. Execute as migrações e seeders:
```bash
docker-compose exec app php artisan migrate --seed
```

7. Inicie o servidor:
```bash
docker-compose exec app php artisan serve --host=0.0.0.0 --port=8000
```

A API estará disponível em `http://localhost:8000`

## Estrutura do Recurso Place

```json
{
    "id": 1,
    "name": "Nome do Lugar",
    "slug": "nome-do-lugar",
    "city": "Cidade",
    "state": "Estado",
    "created_at": "2024-03-26T00:00:00.000000Z",
    "updated_at": "2024-03-26T00:00:00.000000Z"
}
```

## Endpoints da API

### Listar Lugares
```http
GET /api/places
```

**Parâmetros de Query:**
- `name` (opcional): Filtra lugares pelo nome

**Exemplo de Resposta:**
```json
{
    "data": [
        {
            "id": 1,
            "name": "Lugar 1",
            "slug": "lugar-1",
            "city": "Cidade 1",
            "state": "SP",
            "created_at": "2024-03-26T00:00:00.000000Z",
            "updated_at": "2024-03-26T00:00:00.000000Z"
        }
    ]
}
```

### Obter Lugar Específico
```http
GET /api/places/{id}
```

**Exemplo de Resposta:**
```json
{
    "data": {
        "id": 1,
        "name": "Lugar 1",
        "slug": "lugar-1",
        "city": "Cidade 1",
        "state": "SP",
        "created_at": "2024-03-26T00:00:00.000000Z",
        "updated_at": "2024-03-26T00:00:00.000000Z"
    }
}
```

### Criar Lugar
```http
POST /api/places
```

**Corpo da Requisição:**
```json
{
    "name": "Novo Lugar",
    "city": "Nova Cidade",
    "state": "SP"
}
```

**Exemplo de Resposta:**
```json
{
    "data": {
        "id": 2,
        "name": "Novo Lugar",
        "slug": "novo-lugar",
        "city": "Nova Cidade",
        "state": "SP",
        "created_at": "2024-03-26T00:00:00.000000Z",
        "updated_at": "2024-03-26T00:00:00.000000Z"
    }
}
```

### Atualizar Lugar
```http
PUT /api/places/{id}
```

**Corpo da Requisição:**
```json
{
    "name": "Lugar Atualizado",
    "city": "Cidade Atualizada",
    "state": "RJ"
}
```

**Exemplo de Resposta:**
```json
{
    "data": {
        "id": 1,
        "name": "Lugar Atualizado",
        "slug": "lugar-atualizado",
        "city": "Cidade Atualizada",
        "state": "RJ",
        "created_at": "2024-03-26T00:00:00.000000Z",
        "updated_at": "2024-03-26T00:00:00.000000Z"
    }
}
```

## Validação

- `name`: Obrigatório, string, máximo 255 caracteres
- `city`: Obrigatório, string, máximo 255 caracteres
- `state`: Obrigatório, string, máximo 255 caracteres

O campo `slug` é gerado automaticamente a partir do nome.

## Testes

Para executar os testes:
```bash
docker-compose exec app php artisan test
```

Os testes incluem:
- Listagem de lugares
- Filtro por nome
- Obtenção de lugar específico
- Criação de lugar
- Atualização de lugar

## Desenvolvimento

### Comandos Úteis

- Criar nova migration:
```bash
docker-compose exec app php artisan make:migration nome_da_migration
```

- Criar novo controller:
```bash
docker-compose exec app php artisan make:controller NomeController --api
```

- Criar novo model:
```bash
docker-compose exec app php artisan make:model NomeModel -mfs
```

### Logs

Os logs da aplicação podem ser encontrados em:
```bash
docker-compose exec app tail -f storage/logs/laravel.log
```

## Contribuição

1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/nova-feature`)
3. Commit suas mudanças (`git commit -m 'Adiciona nova feature'`)
4. Push para a branch (`git push origin feature/nova-feature`)
5. Abra um Pull Request
