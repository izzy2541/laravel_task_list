{{-- since it extends the layout, laravel will know it needs to take
    the >layouts>app.blade.php and replace the yield driectives with the below content--}}
@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div>
        <a href="{{ route('tasks.index')}}"
        class="link">
        ← Go back to the task list!
        </a>
    </div>
    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif
    {{--diffForHumans() is a laravel method used for handling dates  --}}
    <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} • Updated {{ $task->updated_at->diffForHumans() }}</p>

    <p>
        @if ($task->completed)
        <span class="font-medium text-green-500">
            Completed
        </span>
        @else
        <span class="font-medium text-red-500">
            Not completed
        </span>
        @endif
    </p>
    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}"
        class="btn">Edit</a>

        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task])}}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">
                Mark as {{ $task->completed ? 'not completed' : 'completed'}}
            </button>
        </form>

        {{-- builds form as /tasks/3 for example --}}
        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            {{-- generates a CSRF token for protection against cross-site request forgery. --}}
        @csrf
        {{-- tells Laravel to treat this POST request as a DELETE request
            because HTML forms can only do GET or POST. To do a DELETE, you spoof the method using: --}}
        @method('DELETE')
        <button type="submit" class="btn">Delete</button>
        </form>
    </div>
@endsection
