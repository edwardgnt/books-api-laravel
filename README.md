# Books API (Laravel 12 + MySQL)

A clean, production-style REST API built with **Laravel 12** and **MySQL**, following best practices such as Controllers, Services, Form Requests, Eloquent Resources (DTO-style), Factories, and Seeders.

This project mirrors the structure of a real-world backend API.

---

## 🚀 Features

- ✅ CRUD operations for Books  
- ✅ Service layer (business logic)  
- ✅ Form Requests (validation layer)  
- ✅ API Resources (output transformation)  
- ✅ Database Migrations  
- ✅ Factory-based seeding (100 books)  
- ✅ Pagination (JSON API format)  
- ✅ Strict typing & clean architecture  

Upcoming features (roadmap):

- [ ] Search (title, author)
- [ ] Sorting (by title, author, price, year)
- [ ] Filters (price range, year range)
- [ ] Soft deletes
- [ ] Query optimization & indexing
- [ ] Swagger / OpenAPI documentation
- [ ] Feature tests with Pest
- [ ] CI using GitHub Actions (lint + tests)

---

## 📦 Tech Stack

- **Laravel 12**
- **PHP 8.3**
- **MySQL**
- **Eloquent ORM**
- **Pest** (testing)
- **Factories & Seeders**
- **API Resource Transformers**

---

## 📁 Project Structure

Key backend components:

app/
Http/
Controllers/BooksController.php
Requests/
StoreBookRequest.php
UpdateBookRequest.php
Resources/BookResource.php
Services/
BooksService.php

database/
migrations/
seeders/
BookSeeder.php
factories/
BookFactory.php


Installation & Setup

1. Clone the repository
git clone https://github.com/edwardgnt/books-api-laravel.git

cd books-api-laravel

2. Install dependencies
    composer install

3. Environment setup
    Copy the example environment file:
        cp .env.example .env

    Generate the app key:
        php artisan key:generate

    Configure your MySQL credentials in .env:
    DB_DATABASE=books_api
    DB_USERNAME=root
    DB_PASSWORD=

4. Run migrations & seeders
    php artisan migrate:fresh --seed

5. Run the API locally
    php artisan serve

