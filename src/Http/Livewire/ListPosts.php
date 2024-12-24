<?php

namespace FilamentBlogy\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use FilamentBlogy\Models\Post;

class ListPosts extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    
    protected $queryString = ['search', 'status'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function deletePost($postId)
    {
        $post = Post::find($postId);
        if ($post) {
            $post->delete();
            session()->flash('message', 'Post deleted successfully.');
        }
    }

    public function render()
    {
        $query = Post::query();

        if ($this->search) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('content', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->status) {
            $query->where('status', $this->status);
        }

        $posts = $query->orderBy('created_at', 'desc')
                      ->paginate(10);

        return view('laravel-blog::livewire.list-posts', [
            'posts' => $posts
        ]);
    }
}
