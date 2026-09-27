# Speedy Books

A book website built with Laravel. Visitors browse books by category and read about each title, and an admin panel keeps the catalog, the team page and the media gallery up to date.

## Features

**Public website**

- Home, about, gallery and contact pages
- Book listing and book detail pages
- Browse books by category

**Admin panel**

- Manage books: price, rating, ISBN, publisher, format, language, page count, edition, cover image and a downloadable file
- Mark books as recommended so they show in the recommended section on the home page
- Manage authors with photo, contact details and social links, and feature an author
- Manage categories
- Manage the team section
- Media gallery uploads
- Dashboard

**Accounts**

- Registration, login and logout
- Email verification and password reset
- Profile page with password change

## Tech stack

- PHP 8, Laravel 9
- Laravel Sanctum
- Blade templates
- MySQL
- Vite

## Database

| Table | Holds |
|---|---|
| `book` | Books with category, author, price, rating, ISBN, cover, file and status |
| `category` | Book categories |
| `author` | Author profiles and social links |
| `team` | Team members |
| `media` | Gallery images |
| `countries` | Country list for authors and publishers |
| `users` | Accounts |

## Getting started

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Add your database details to `.env`, then:

```bash
php artisan migrate
npm run build
php artisan serve
```

Open `http://localhost:8000`.

---

Built by [Zain Ul Abideen](https://github.com/zainulabideen5)
