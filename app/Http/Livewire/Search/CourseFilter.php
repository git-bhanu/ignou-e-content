<?php

namespace App\Http\Livewire\Search;

use App\Models\Course;
use Livewire\Component;
use App\Models\Publisher;

class CourseFilter extends Component
{
    public $courses;

    public function mount()
    {
        
    }


    public function render()
    {
        return view('livewire.search.course-filter');
    }
}
