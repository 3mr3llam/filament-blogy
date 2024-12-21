<?php

use Illuminate\Support\Facades\Route;

Route::middleware(config('blog.admin_middleware'))->group(function () {
    Route::get('/blog/posts', \Vendor\LaravelBlog\Http\Livewire\BlogPosts::class)->name('blog.posts.index');
    Route::get('/blog/posts/create', \Vendor\LaravelBlog\Http\Livewire\CreatePost::class)->name('blog.posts.create');
    Route::get('/blog/posts/{post}', \Vendor\LaravelBlog\Http\Livewire\ShowPost::class)->name('blog.posts.show');
    Route::get('/blog/posts/{post}/edit', \Vendor\LaravelBlog\Http\Livewire\EditPost::class)->name('blog.posts.edit');
});
