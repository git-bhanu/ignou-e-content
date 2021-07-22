<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;

class PublisherFilter extends Component
{
    public $publishers;

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.search.publisher-filter');
    }
}
