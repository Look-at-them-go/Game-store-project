<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title')</title>
	<meta name="author" content="name">
    <meta name="description" content="description here">
	<meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen bg-gray-300">
    <header>
        <div class="grid grid-cols-2 bg-gray-400">
            <div class="flex justify-center justify-items-center">
                <h1 class="font-medium leading-tight text-5xl mt-0 mb-2 text-indigo-600">GameStore</h1>
            </div>
            <div class="flex p-2 space-x-2 justify-end justify-items-center">
                @if (Route::has('login'))
                    @auth
                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                     @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
        
    </header>
    <div class="w-full flex flex-row sm:flex-col flex-grow overflow-hidden">
        <div class="sm:w-1/6 md:1/4 w-4/12 flex-shrink flex-grow-0 p-4">
            <div class="sticky top-0 p-4 bg-gray-100 rounded-xl w-full">
                <ul class="flex sm:flex-col overflow-hidden content-center justify-between">
                    @yield('menu')
                </ul>
            </div>
        </div>
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>



