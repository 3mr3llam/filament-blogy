<?php

namespace FilamentBlogy\Models;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    protected $fillable = [
        'post_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_title',
        'og_description',
        'og_image'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
