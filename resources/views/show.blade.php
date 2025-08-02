{{-- since it extends the layout, laravel will know it needs to take
    the >layouts>app.blade.php and replace the yield driectives with the below content--}}
@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <p>{{ $task->description }}</p>

    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <p>
        @if ($task->completed)
            Completed
        @else
            Not completed
        @endif
    </p>
    <div>
        <a href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a>
    </div>

    <div>
        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task])}}">
            @csrf
            @method('PUT')
            <button type="submit">
                Mark as {{ $task->completed ? 'not completed' : 'completed'}}
            </button>
        </form>
    </div>

    <div>
        {{-- builds form as /tasks/3 for example --}}
        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            {{-- generates a CSRF token for protection against cross-site request forgery. --}}
        @csrf
        {{-- tells Laravel to treat this POST request as a DELETE request
            because HTML forms can only do GET or POST. To do a DELETE, you spoof the method using: --}}
        @method('DELETE')
        <button type="submit">Delete</button>
        </form>
    </div>
@endsection
