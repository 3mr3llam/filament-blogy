<?php

namespace FilamentBlogy\Http\Livewire;

use Livewire\Component;
use FilamentBlogy\Models\Post;

class ShowPost extends Component
{
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('laravel-blog::livewire.show-post', [
            'post' => $this->post
        ]);
    }
}