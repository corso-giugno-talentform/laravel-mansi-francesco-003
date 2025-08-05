<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sito Test</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('pages.homepage') }}">{{ env('APP_NAME') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pages.homepage') }}">Homepage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.index') }}">Gestione Libri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('authors.index') }}">Gestione Autori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Gestione Categorie</a>
                    </li>
                    @guest

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button class="nav-link" type="submit">Logout</button>
                            </form>

                        </li>
                    @endguest

                </ul>

                @auth
                    Ciao, {{ Auth::user()->name }}
                @endauth
            </div>
        </div>
    </nav>
    <main class="container mt-5">
        {{ $slot }}
    </main>

</body>

</html>
