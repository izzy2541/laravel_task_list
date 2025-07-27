@extends('layouts.app')

@section('title', 'The list of tasks')


@section('content')
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['id' => $task->title]) }}">{{ $task ->title}}</a>
        </div>
     {{-- instead of else, we can use @empty which means run the below code if the
        task list is empty --}}
    @empty
        <div>There are no tasks!</div>
    @endforelse
@endsection

