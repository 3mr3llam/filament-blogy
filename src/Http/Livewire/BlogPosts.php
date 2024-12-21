<?php

namespace Vendor\LaravelBlog\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Vendor\LaravelBlog\Models\Post;

class BlogPosts extends Component
{
    use WithPagination;

    public $search = '';
    
    protected $queryString = ['search'];

    public function render()
    {
        $posts = Post::where('status', 'published')
            ->where(function($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%');
            })
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));

        return view('laravel-blog::livewire.blog-posts', [
            'posts' => $posts
        ]);
    }
}
