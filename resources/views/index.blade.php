<h1>
    The list of tasks
</h1>

<div>
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['id' => $task->title]) }}">{{ $task ->title}}</a>
        </div>
     {{-- instead of else, we can use @empty which means run the below code if the
        task list is empty --}}
    @empty
        <div>There are no tasks!</div>
    @endforelse
</div>
