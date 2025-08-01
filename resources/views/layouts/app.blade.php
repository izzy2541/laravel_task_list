<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 10 Task List App</title>
        @yield('styles')
    </head>

    <body>
        <h1>@yield('title')</h1>
        <div>
            @if (session()->has('success'))
            {{-- check that success variable exists, if yes show message --}}
                <div>{{ session('success') }}</div>
            @endif
            @yield("content")
        </div>
    </body>
</html>
