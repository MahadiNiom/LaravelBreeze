<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Post;

class MultiSearch extends Component
{

    public $query = '';


    public function render()
    {
        
        $users = [];
        $posts = [];

        if (!empty($this->query)) {
            $users = User::where('name', 'like', '%' . $this->query . '%')->get();
            $posts = Post::where('title', 'like', '%' . $this->query . '%')->get();
        }

        return view('livewire.multi-search', compact('posts', 'users'));
    
    }
}
