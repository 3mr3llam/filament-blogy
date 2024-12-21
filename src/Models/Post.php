<?php

namespace FilamentBlogy\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'published_at',
        'featured_image',
        'status'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function meta(): HasOne
    {
        return $this->hasOne(PostMeta::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->meta()->delete();
            // Clean up the featured image if needed
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
        });
    }
}
