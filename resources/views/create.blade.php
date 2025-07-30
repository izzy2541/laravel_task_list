@extends('layouts.app')

@section('title', 'Add Task')
@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0, 8rem;
        }
    </style>
@endsection


@section('content')
{{$errors}}
    <form method="POST" action="{{ route('tasks.store') }}">
        {{-- csrf is a middleware that protects users from malicious websote requests --}}
        @csrf
        <div>
            <label for="title">
                Title
            </label>
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
            <input text="text" name="title" id="title"/>
        </div>
        <div>
            <label for="Description">
                Description
            </label>
            <textarea name="description" id="description" rows="5"></textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">
               Long Description
            </label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@endsection
