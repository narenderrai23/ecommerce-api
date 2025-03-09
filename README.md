# E-Commerce API with Laravel

## Introduction

This project is a fully functional RESTful API for an e-commerce platform built using Laravel. The API supports CRUD operations for products, authentication using Laravel Passport, caching, and includes API documentation using Swagger.

## Features

-   Laravel 12 framework
-   Product CRUD operations
-   Authentication with Laravel Passport
-   API documentation using Swagger (L5-Swagger)
-   Database migrations and seeders
-   Caching for performance improvement
-   Docker support for easy deployment
-   Fixtures for base data

## Technologies Used

-   PHP 8.2
-   Laravel 12
-   MySQL
-   Laravel Passport (OAuth2 Authentication)
-   L5-Swagger (API Documentation)
-   Docker

## Installation

### Prerequisites

Ensure you have the following installed:

-   PHP 8.2+
-   Composer
-   Docker & Docker Compose
-   MySQL

### Clone the Repository

```sh
git clone https://github.com/narenderrai23/ecommerce-api.git
cd ecommerce-api
```

### Setup Environment Variables

Copy the `.env.example` file and update your database credentials:

```sh
cp .env.example .env
```

Modify the `.env` file:

```
DB_DATABASE=ecommerce_api
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

### Install Dependencies

```sh
composer install
```

### Generate Application Key

```sh
php artisan key:generate
```

### Run Migrations & Seed Database

```sh
php artisan migrate --seed
```

### Start the Development Server

```sh
php artisan serve
```

## Running with Docker

### Build and Start Containers

```sh
docker-compose up -d --build
```

### Run Migrations & Load Fixtures

```sh
docker exec -it ecommerce-api php artisan migrate --seed
```

## API Documentation

The API documentation is auto-generated using Swagger. After running the application, access the docs at:

```
http://127.0.0.1:8000/api/documentation
```

To generate the API documentation, run:

```sh
php artisan l5-swagger:generate
```

## Testing the API

Use tools like **Postman** or **cURL** to test the API endpoints.
