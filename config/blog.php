<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Database Table Prefix
    |--------------------------------------------------------------------------
    |
    | This value is the prefix that will be added to all database tables
    | created by this package. For example, if you set this to 'blogy_',
    | the posts table will be 'blogy_posts'.
    |
    */
    'table_prefix' => 'blogy_',

    /*
    |--------------------------------------------------------------------------
    | Posts Configuration
    |--------------------------------------------------------------------------
    */
    'posts_per_page' => 10,
    
    /*
    |--------------------------------------------------------------------------
    | Default Meta Configuration
    |--------------------------------------------------------------------------
    */
    'default_meta' => [
        'title' => 'My Blog',
        'description' => 'A Laravel blog with SEO features',
        'keywords' => 'blog, laravel, seo',
    ],

    /*
    |--------------------------------------------------------------------------
    | Feature Toggles
    |--------------------------------------------------------------------------
    */
    'enable_comments' => true,

    /*
    |--------------------------------------------------------------------------
    | Security & Access
    |--------------------------------------------------------------------------
    */
    'admin_middleware' => ['auth', 'admin'],
];
