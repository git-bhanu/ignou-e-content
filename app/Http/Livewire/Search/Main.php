<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;
use App\Models\Publisher;
use App\Models\Course;
use App\Models\Resource;
use Spatie\QueryBuilder\QueryBuilderRequest;
use Spatie\QueryBuilder\QueryBuilder;
use Livewire\WithPagination;


class Main extends Component
{
    use WithPagination;

    public $selectedCourses = [];
    public $selectedPublishers = [];
    public $selectedContributor = ''; 

    // All Filterable Data
    public $courses;
    public $publishers;

    // Query String
    protected $queryString = [
        'selectedCourses'  => ['except' => []],
        'selectedPublishers' => ['except' => []], 
        'selectedContributor' => ['except' => ''],
    ];

    /** @var QueryBuilderRequest */
    protected $request;

    /** @var array<string,string> */
    public $filter = [];

    public $resources;

    


    public function request(): QueryBuilderRequest
    {
        if (!$this->request) {
            $this->request = app(QueryBuilderRequest::class);
        }
        return $this->request;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function searchResource()
    {
        if (!empty($this->selectedCourses)) {
            $this->filter['course_id'] = $this->selectedCourses;
            $this->request()->query->set('filter', $this->filter);
        }

        if (!empty($this->selectedPublishers)) {
            $this->filter['publisher_id'] = $this->selectedPublishers;
            $this->request()->query->set('filter', $this->filter);
        }

        $this->resources = QueryBuilder::for(Resource::query(), $this->request())
        ->allowedFilters('course_id', 'publisher_id')
        ->get();

        $this->updatingSearch();
    }


    public function render()
    {
        return view('livewire.search.main', [
            'resources' => $this->resources
        ]);
    }

    public function mount()
    {
        $this->courses = Course::all();
        $this->publishers = Publisher::all();
        $this->searchResource();
    }

    public function resetAll()
    {
        $this->selectedCourses = [];
        $this->selectedPublishers = [];
        $this->selectedContributor = '';
        $this->searchResource();

    }
}
