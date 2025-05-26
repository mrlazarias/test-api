# Places API

A RESTful API for managing places built with Laravel 12 and PostgreSQL.

## Features

- Create, read, update, and list places
- Filter places by name
- Automatic slug generation from place names
- PostgreSQL database support
- Docker development environment

## Requirements

- Docker and Docker Compose
- PHP 8.2+
- PostgreSQL 15+

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd api-test
```

2. Copy the environment file:
```bash
cp .env.example .env
```

3. Start the Docker containers:
```bash
docker-compose up -d
```

4. Install dependencies:
```bash
docker-compose exec app composer install
```

5. Generate application key:
```bash
docker-compose exec app php artisan key:generate
```

6. Run migrations:
```bash
docker-compose exec app php artisan migrate
```

## API Endpoints

### Places

- `GET /api/places` - List all places
- `GET /api/places?name=query` - Filter places by name
- `GET /api/places/{id}` - Get a specific place
- `POST /api/places` - Create a new place
- `PUT /api/places/{id}` - Update a place

### Request/Response Format

#### Create/Update Place
```json
{
    "name": "Place Name",
    "city": "City Name",
    "state": "ST"
}
```

#### Place Response
```json
{
    "id": 1,
    "name": "Place Name",
    "slug": "place-name",
    "city": "City Name",
    "state": "ST",
    "created_at": "2024-03-19T00:00:00.000000Z",
    "updated_at": "2024-03-19T00:00:00.000000Z"
}
```

## Development

### Running Tests
```bash
docker-compose exec app php artisan test
```

### Database Migrations
```bash
docker-compose exec app php artisan migrate
```

### Database Seeders
```bash
docker-compose exec app php artisan db:seed
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
