
# Quiban Blog Application

A Laravel-based Blog Management System with CRUD functionality and a Reports Module.

## Features

- User Registration and Login (Laravel Breeze)
- Create, View, Edit, and Delete Blog Posts
- Filter Blog Posts by Start Date and End Date
- Generate Blog Post Reports
- Export Reports as PDF
- Export Reports as CSV
- Responsive Dashboard and User Interface

## Technologies Used

- Laravel 12
- PHP 8.5
- MySQL
- Laravel Breeze
- Tailwind CSS
- DomPDF
- JavaScript
- HTML and CSS

## Installation Instructions

1. Clone the repository:

   git clone YOUR_GITHUB_REPOSITORY_URL

2. Navigate to the project folder:

   cd Quiban_blogapp

3. Install PHP dependencies:

   composer install

4. Install frontend dependencies:

   npm install

5. Create your environment file:

   copy .env.example .env

6. Generate application key:

   php artisan key:generate

7. Configure your database in the .env file.

8. Run database migrations:

   php artisan migrate

9. Build frontend assets:

   npm run build

10. Start the Laravel server:

    php artisan serve

11. Open http://127.0.0.1:8000

## Reports Module

The Reports Module allows users to:

- Filter posts by date.
- View the total number of posts.
- Export reports as PDF.
- Export reports as CSV.

## Developer

Quiban
