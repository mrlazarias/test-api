# Places API

A RESTful API for managing places built with Laravel 12 and PostgreSQL. This project implements a complete CRUD API with automatic slug generation, filtering capabilities, and follows Laravel best practices.

## Features

- Create, read, update, and list places
- Filter places by name (case-insensitive search)
- Automatic slug generation from place names
- PostgreSQL database support
- Docker development environment
- Comprehensive test coverage
- API Resource transformation
- Form Request validation
- Database migrations and factories

## Project Architecture

```
.
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── PlaceController.php    # Handles API endpoints
│   │   ├── Requests/
│   │   │   └── PlaceRequest.php       # Form validation rules
│   │   └── Resources/
│   │       └── PlaceResource.php      # API response transformation
│   └── Models/
│       └── Place.php                  # Eloquent model with slug generation
├── database/
│   ├── migrations/
│   │   └── create_places_table.php    # Database schema
│   ├── factories/
│   │   └── PlaceFactory.php          # Test data generation
│   └── seeders/
│       └── PlaceSeeder.php           # Database seeding
├── tests/
│   └── Feature/
│       └── PlaceApiTest.php          # API endpoint tests
├── docker-compose.yml                # Docker services configuration
└── Dockerfile                        # PHP application container
```

## Implementation Details

### Database Schema
The places table includes:
- `id`: Auto-incrementing primary key
- `name`: Place name (required)
- `slug`: URL-friendly version of name (auto-generated)
- `city`: City name (required)
- `state`: State abbreviation (required)
- `created_at` and `updated_at`: Timestamps

### Key Components

1. **Place Model**
   - Automatic slug generation using Laravel's `saving` event
   - Fillable attributes defined for mass assignment
   - Factory for test data generation

2. **PlaceController**
   - RESTful API endpoints implementation
   - Name-based filtering with case-insensitive search
   - Resource transformation for consistent responses

3. **PlaceRequest**
   - Input validation rules
   - Required fields: name, city, state
   - String length restrictions

4. **PlaceResource**
   - API response transformation
   - Consistent JSON structure
   - Includes all relevant place data

5. **Tests**
   - Feature tests for all API endpoints
   - Database assertions
   - Response structure validation

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
- `GET /api/places?name=query` - Filter places by name (case-insensitive)
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

### Useful Commands

- Create new migration:
```bash
docker-compose exec app php artisan make:migration migration_name
```

- Create new controller:
```bash
docker-compose exec app php artisan make:controller NameController --api
```

- Create new model with migration, factory, and seeder:
```bash
docker-compose exec app php artisan make:model Name -mfs
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
