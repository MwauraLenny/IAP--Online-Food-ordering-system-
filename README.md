# Foodies — Online Food Ordering System

Foodies is a web application for a restaurant ordering workflow. The Laravel routes and commit history show account access, separate customer and vendor dashboards, a menu and cart flow, and checkout routes. The project does not document or expose a real-time delivery-tracking feature, so this README does not claim one.

## Features

- Customer registration, login, and logout
- Role-aware customer and vendor dashboard routes
- Menu and cart workflow
- Checkout page and checkout submission route
- Database models, migrations, and seeders

## My contribution

Lenny Mwaura Mwangi was responsible for the core application logic and functionality. The repository history also includes commits from collaborators.

## Technology

- PHP and Laravel
- Livewire and Tailwind CSS are present in the project history and assets
- Database connection is configured through Laravel's environment settings; the repository does not identify a single required production database

## Run locally

Requirements: PHP and Composer, Node.js and npm, and a database supported by Laravel.

1. Install PHP dependencies: `composer install`.
2. Copy `.env.example` to `.env` and set the database connection and credentials.
3. Generate the application key: `php artisan key:generate`.
4. Create the configured database and run migrations: `php artisan migrate`.
5. Install and build frontend assets: `npm install` and `npm run build`.
6. Start the app: `php artisan serve`.

The application will be available at the local URL printed by Artisan. No hosted demo is documented in this repository.
