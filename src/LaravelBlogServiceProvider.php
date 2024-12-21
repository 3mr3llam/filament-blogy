<?php

namespace FilamentBlogy;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Support\ServiceProvider;
use FilamentBlogy\Filament\Resources\PostResource;
use Filament\Panel;
use Livewire\Livewire;

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
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-blog');
        
        // Publish assets
        $this->publishes([
            __DIR__.'/../config/blog.php' => config_path('blog.php'),
            __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-blog'),
            __DIR__.'/../public' => public_path('vendor/laravel-blog'),
        ], 'laravel-blog');

        // Register Livewire components
        Livewire::component('blog-posts', \FilamentBlogy\Http\Livewire\BlogPosts::class);
        Livewire::component('create-post', \FilamentBlogy\Http\Livewire\CreatePost::class);
        Livewire::component('edit-post', \FilamentBlogy\Http\Livewire\EditPost::class);

        // Register Filament Resources
        Panel::configureUsing(function (Panel $panel) {
            $panel->resources([
                PostResource::class,
            ]);
        });
    }
}
