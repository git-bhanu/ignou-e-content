<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;

class ContributorFilter extends Component
{
    public $contributor;

    public function render()
    {
        return view('livewire.search.contributor-filter');
    }
}