<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title') | Eventify</title>
</head>

<body class="bg-gray-50 text-gray-800">

    <nav class="bg-white shadow-sm">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">

            <a href="{{ route('events.index') }}" class="text-2xl font-bold text-blue-600">
                Eventify
            </a>

            <div class="flex gap-6">
                <a href="{{ route('events.index') }}" class="hover:text-blue-600">
                    Events
                </a>

                <a href="{{ route('about.index') }}" class="hover:text-blue-600">
                    About
                </a>

                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth

            </div>

        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-8">
        @yield('content')
    </main>

    <footer class="text-center py-6 text-gray-500">
        &copy; 2026 Eventify
    </footer>

</body>

</html>
