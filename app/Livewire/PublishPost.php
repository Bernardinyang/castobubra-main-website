<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class PublishPost extends Component
{

    public int $post_id;
    public $published_at;

    public function mount(): void
    {
        $this->published_at = (bool)Post::select('published_at')->where('id', $this->post_id)->first()->published_at;
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.publish-post');
    }

    public function publish(): void
    {
        if ($this->published_at) {
            Post::where([
                ['id', $this->post_id],
                ['published_at', NULL]
            ])->update([
                'published_at' => now()
            ]);
        } else {
            Post::where([
                ['id', $this->post_id],
                ['published_at', '!=', NULL]
            ])->update([
                'published_at' => NULL
            ]);
        }
    }

}
