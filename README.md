# Filament Blogy

A powerful and elegant blog package for Laravel Filament v3 with SEO features.

## Requirements

- PHP 8.1 or higher
- Laravel 10.0 or higher
- Filament 3.x

## Features

- Modern, responsive blog management interface
- SEO-friendly with meta data management
- Featured image support
- Draft/Published post status
- Rich text editing
- Scheduled publishing
- Open Graph meta data support
- Table prefix support to avoid conflicts

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

## Configuration

You can customize the package behavior in the published config file:

```php
// config/blog.php

return [
    // Set a custom table prefix to avoid conflicts
    'table_prefix' => 'blogy_',

    // Number of posts to show per page
    'posts_per_page' => 10,

    // Default meta data
    'default_meta' => [
        'title' => 'My Blog',
        'description' => 'A Laravel blog with SEO features',
        'keywords' => 'blog, laravel, seo',
    ],

    // Feature toggles
    'enable_comments' => true,

    // Access control
    'admin_middleware' => ['auth', 'admin'],
];
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

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email iacoder@live.com instead of using the issue tracker.

## Credits

- [Amr Allam](https://github.com/YOUR_GITHUB_USERNAME)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
