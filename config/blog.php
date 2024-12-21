<?php

return [
    'posts_per_page' => 10,
    'default_meta' => [
        'title' => 'My Blog',
        'description' => 'A Laravel blog with SEO features',
        'keywords' => 'blog, laravel, seo',
    ],
    'enable_comments' => true,
    'admin_middleware' => ['auth', 'admin'],
];
