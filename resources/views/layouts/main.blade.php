<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        {{-- <nav class="navbar navbar-expand-lg navbar-light"></nav>
        <div class="collapse navbar-collapse" id="navbar"></div> --}}

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item {{ $currentpage === 'main' ? 'active' : '' }}">
                        <a class="nav-link" href="/">Aba 1<span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('asd') }}">Aba 2</a>
                    </li>
                    <li class="nav-item {{ $currentpage === 'teste' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('teste') }}">Aba 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Aba 4</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container mt-3">
            @if (session('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none';"></button>
                </div>
            @endif
            @if (session('msg-error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('msg-error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none';"></button>
                </div>
            @endif
    </main>
    <div>
        @yield('content')
    </div>
</body>
</html>
