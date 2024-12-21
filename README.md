# Filament Blogy

A powerful and elegant blog package for Laravel Filament v3 with SEO features.

## Features

- Modern, responsive blog management interface
- SEO-friendly with meta data management
- Featured image support
- Draft/Published post status
- Rich text editing
- Scheduled publishing
- Open Graph meta data support

## Installation

1. Add the package to your Laravel project:

```bash
composer require filament/blogy
```

2. Publish the package config:

```bash
php artisan vendor:publish --provider="FilamentBlogy\\FilamentBlogyServiceProvider"
```

3. Run the migrations:

```bash
php artisan migrate
```

## Usage

Once installed, you'll find a new "Blog" section in your Filament admin panel with the following features:

### Managing Posts

- List all posts with status indicators
- Create new posts with rich text editor
- Upload featured images
- Set SEO meta data
- Schedule post publication
- Manage post status (draft/published)

### SEO Features

Each post can have:
- Meta title
- Meta description
- Meta keywords
- Open Graph title
- Open Graph description
- Open Graph image

## Requirements

- PHP 8.1+
- Laravel 10.x
- Filament 3.x

## License

MIT License

## Author

Amr Allam (iacoder@live.com)
