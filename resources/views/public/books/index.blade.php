@extends('layouts.main')

@section('title', "Biblioteca")
@section('content')

<div class="container mt-5">
    <div class="row">
        @foreach($livros as $book)
            <!-- Em monitores grandes (lg) exibe 8 por linha, em tablets (md) 5, e em celulares (sm) 3 -->
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12 mb-3">
                <div class="card">
                    {{-- <img src="{{ asset('storage/'.$livro->imagem) }}" class="card-img-top" alt="..."> --}}
                    <img src="{{ asset('https://dunlite.com.au/wp-content/uploads/2019/04/placeholder.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <h5>Autores:</h5>
                        @foreach($book->authors as $author)
                        <p class="card-text">{{ $author->name }}</p>
                        @endforeach
                        @if($book->publisher)
                        <p class="card-text">Editora: {{  $book->publisher->name }}</p>
                        @else
                        <p>Editora: Não cadastrada</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
