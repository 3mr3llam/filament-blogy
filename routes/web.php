<?php

use Illuminate\Support\Facades\Route;

Route::middleware(config('blog.admin_middleware'))->group(function () {
    Route::get('/blog/posts', \FilamentBlogy\Http\Livewire\BlogPosts::class)->name('blog.posts.index');
    Route::get('/blog/posts/create', \FilamentBlogy\Http\Livewire\CreatePost::class)->name('blog.posts.create');
    Route::get('/blog/posts/{post}', \FilamentBlogy\Http\Livewire\ShowPost::class)->name('blog.posts.show');
    Route::get('/blog/posts/{post}/edit', \FilamentBlogy\Http\Livewire\EditPost::class)->name('blog.posts.edit');
});