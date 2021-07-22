<div>
    <h2>Search your Book</h2>

    Contributor Name
    <div>
        <input type="text" name="contributor" placeholder="contributor" wire:model="selectedContributor">
    </div>

    <div>
        Publishers
        @foreach ($publishers as $publisher)
        <div>
            <input type="checkbox" id="publisher_{{ $publisher->id }}" name="publisher" value="{{ $publisher->id }}" wire:model="selectedPublishers">
            <label for="publisher_{{ $publisher->id }}"> {{ $publisher->name }}</label>
        </div>
        @endforeach
    </div>

    <div>
        Courses
        @foreach ($courses as $course)
        <div>
            <input type="checkbox" id="course_{{ $course->id }}" name="course" value="{{ $course->id }}" 
            wire:model="selectedCourses"
            >
            <label for="course_{{ $course->id }}"> {{ $course->name }}</label>
        </div>
        @endforeach
    </div>

    Already Selected Filters
    @foreach ($selectedPublishers as $item)
        <button>{{ $item }}</button>
    @endforeach

    @foreach ($selectedCourses as $item)
        <button>{{ $item }}</button>
    @endforeach

    @if($selectedContributor)
    <button> 
        {{ $selectedContributor }}
    </button>
    @endif

    <div>

        <button wire:click="searchResource">
            Saerch
        </button>
    </div>

    <button wire:click="resetAll">
        Reset Filter
    </button>

    <ol>
        @foreach ($resources as $item)
        <li>
            {{ $item->title }}
            <ol>
                <li>Publisher :: {{ $item->publisher->name }}</li>
                <li>Course :: {{ $item->course->name }}</li>
            </ol>
        </li>
    @endforeach
    </ol>
</div>


