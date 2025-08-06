<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 10 Task List App</title>
        <script src="https://cdn.tailwindcss.com"></script>
        @yield('styles')
    </head>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn{
            @apply rounded-md px-2 py-1 text-slate-700 text-center font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }

        .link{
            @apply font-medium text-gray-700 underline decoration-pink-500
        }

        label{
            @apply block uppercase text-slate-700 mb-2
        }

        input, textarea {
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }

        .error{
            @apply text-red-500 text-sm
        }
    </style>
    {{-- blade-formatter-enable --}}

    <body class="container mx-auto mt-10 mb-10 max-w-lg">
        <h1 class="text-2xl mb-4">@yield('title')</h1>
        <div>
            @if (session()->has('success'))
            {{-- check that success variable exists, if yes show message --}}
                <div>{{ session('success') }}</div>
            @endif
            @yield("content")
        </div>
    </body>
</html>
