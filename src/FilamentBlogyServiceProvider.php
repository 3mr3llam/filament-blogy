<?php

namespace FilamentBlogy;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;
use FilamentBlogy\Filament\Resources\PostResource;

class FilamentBlogyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/blog.php', 'blog'
        );
    }

    public function boot()
    {
        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'filament-blogy');

        // Publish config
        $this->publishes([
            __DIR__.'/../config/blog.php' => config_path('blog.php'),
        ], 'filament-blogy-config');

        // Publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/filament-blogy'),
        ], 'filament-blogy-views');

        // Register resources
        Filament::registerResources([
            PostResource::class,
        ]);

        // Add to navigation
        Filament::serving(function () {
            Filament::registerNavigationItems([
                NavigationItem::make('Blog')
                    ->icon('heroicon-o-document-text')
                    ->group('Content')
                    ->sort(3)
                    ->url(PostResource::getUrl()),
            ]);
        });
    }
}
