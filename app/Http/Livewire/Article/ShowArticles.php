<?php

namespace App\Http\Livewire\Article;

use App\Models\Article;
use Livewire\Component;

class ShowArticles extends Component
{
    public $item;
    
    public function mount(Article $article)
    {
        $this->item = $article;
    }

    public function render()
    {
        return view('livewire.article.show-articles');
    }
}
