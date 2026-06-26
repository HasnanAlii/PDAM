# PDAM Web Information System

PDAM Web Information System is a Laravel-based web application for publishing PDAM service information and managing public-facing content such as news, galleries, partner logos, company profile content, water tariff simulations, and customer bill checks.

The project provides a public website for customers and an authenticated admin area for internal content management.

## Main Features

- Public homepage with latest news and partner information.
- News module with category support, detail pages, and admin CRUD management.
- Gallery module with image upload, detail pages, and admin CRUD management.
- Partner module for managing partner names, logos, and external links.
- About Us module for managing company profile, vision, mission, and image content.
- Water bill simulation based on customer group and progressive water usage tariffs.
- Customer bill checking through an external PDAM transaction API.
- Authentication, registration, password reset, email verification, and profile management using Laravel Breeze.
- Admin dashboard with content summary and recent activity.

## Technology Stack

- PHP `^8.2`
- Laravel `^12.0`
- Laravel Breeze
- Laravel Sanctum
- Blade templates
- Tailwind CSS
- Vite
- Alpine.js
- Pest / PHPUnit for testing
- MySQL, MariaDB, PostgreSQL, SQLite, or another Laravel-supported database

## Project Structure

```text
app/
  Http/Controllers/     Application controllers for public and admin modules
  Models/               Eloquent models for news, gallery, partners, simulation, and users
database/
  migrations/           Database schema definitions
  seeders/              Initial admin user, about page content, and tariff simulation data
public/
  assets/images/        Public website images and static assets
resources/
  views/                Blade views for public pages, admin pages, layouts, and auth
  css/                  Tailwind entry file
  js/                   Vite and Alpine JavaScript entry files
routes/
  web.php               Public, authenticated, and admin web routes
tests/
  Feature, Unit         Application test files
```

## Requirements

Make sure the following tools are installed:

- PHP 8.2 or newer
- Composer
- Node.js and npm
- A supported database server, or SQLite for local development
- Git

Recommended PHP extensions:

- BCMath
- Ctype
- cURL
- DOM
- Fileinfo
- JSON
- Mbstring
- OpenSSL
- PDO
- Tokenizer
- XML

## Installation Guide

1. Clone the repository.

```bash
git clone <repository-url>
cd PDAM
```

2. Install PHP dependencies.

```bash
composer install
```

3. Install JavaScript dependencies.

```bash
npm install
```

4. Create the environment file.

```bash
cp .env.example .env
```

5. Generate the application key.

```bash
php artisan key:generate
```

6. Configure the database connection in `.env`.

Example for MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pdam
DB_USERNAME=root
DB_PASSWORD=
```

Create the database manually before running migrations.

7. Run database migrations and seeders.

```bash
php artisan migrate --seed
```

The seeders create:

- A default admin account
- Default About Us content
- Initial tariff simulation data

Default admin credentials:

```text
Email: admin@gmail.com
Password: password123
```

Change these credentials immediately after first login in any real deployment.

8. Create the storage symbolic link.

```bash
php artisan storage:link
```

This is required so uploaded images in `storage/app/public` can be accessed from the browser.

9. Start the development servers.

Run Laravel:

```bash
php artisan serve
```

Run Vite in another terminal:

```bash
npm run dev
```

The application is usually available at:

```text
http://127.0.0.1:8000
```

## Alternative Development Command

This project also includes a Composer development script that runs the Laravel server, queue listener, log viewer, and Vite together:

```bash
composer run dev
```

Use this when all dependencies are installed and you want a complete local development process from one command.

## Building Assets for Production

```bash
npm run build
```

For production deployments, also cache Laravel configuration and routes after setting the final `.env` values:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Running Tests

```bash
composer test
```

Or directly:

```bash
php artisan test
```

## Main Routes

Public pages:

- `/` - Homepage
- `/berita` - News listing
- `/berita/{berita}` - News detail
- `/galeri` - Gallery listing
- `/galeri/{gallery}` - Gallery detail
- `/tentangkami` - About Us page
- `/simulasi` - Water tariff simulation
- `/cek-tagihan` - Customer bill check
- `/partner-view` - Partner page

Authenticated pages:

- `/dashboard` - Admin dashboard
- `/profile` - User profile management
- `/beritas` - News management
- `/galeries` - Gallery management
- `/partners` - Partner management
- `/tentang-kami` - About Us management
- `/simulasions` - Tariff simulation management

## External Bill Check API

The bill check feature sends requests to an external endpoint from `CekTagihanController`:

```text
http://120.89.90.102:1030/api/transaksi/{nomor_pelanggan}
```

If this service is unavailable, unreachable, or changed by the provider, the bill check page may return an error. For production usage, consider moving this endpoint into `.env` and adding timeout, retry, and logging configuration.

## Useful Artisan Commands

```bash
php artisan migrate
php artisan migrate:fresh --seed
php artisan storage:link
php artisan optimize:clear
php artisan route:list
```

## Deployment Notes

- Set `APP_ENV=production` and `APP_DEBUG=false`.
- Configure the correct `APP_URL`.
- Use a secure database user and password.
- Run `composer install --no-dev --optimize-autoloader`.
- Run `npm run build`.
- Ensure `storage/` and `bootstrap/cache/` are writable by the web server.
- Configure a queue worker if background jobs are used.
- Protect the default admin account by changing the seeded password.

## License

This project is based on Laravel, which is open-sourced software licensed under the MIT license. Project-specific licensing should be defined by the repository owner.
