@extends('layouts.main')

@section('title', "Tela inicial")
@section('content')

<div class="container">
    <form action="{{ route('main') }}" method="GET">
        <input class='search-bar' type="text" name="search" placeholder="Buscar livros..." width="100">
        
    </form>

    @if($search)
    <h1>Buscando por: "{{$search}}"</h1>
    @else
    <h1>Livros</h1>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
           @foreach($livros as $book)
            <tr>
                <td>{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td>
                    <!-- Botões de ação -->
                    <a href="{{route('editBook', ['id' => $book->id]) }}" class="btn btn-primary">Editar</a>
                    <form class='inline' method="post" action="{{route('deleteBook', ['id' => $book->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                    <a href="{{route('showBookDetails', ['id' => $book->id]) }}" class="btn btn-success">Detalhes</a>
                    {{-- <a href="{{route('deleteBook', ['id' => $book->id]) }}" class="btn btn-danger">Excluir</a> --}}
                </td>
            </tr>
            @endforeach
            <!-- Outras linhas da tabela podem ser adicionadas conforme necessário -->
        </tbody>
    </table>
    <div class="d-flex justify-content-center"> <!-- Envolve o botão em um div com as classes d-flex e justify-content-center -->
        <a href="{{ route('createBook') }}" class="btn btn-secondary">Adicionar Livro</a>
    </div>
</div>

@endsection