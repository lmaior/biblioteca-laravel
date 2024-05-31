<?php

use Carbon\Carbon;

?>

@extends('layouts.main')
@section('title', "Detalhes do Livro")
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    {{-- Imagem do Livro --}}
                    @if($book->image)
                        <img src="{{ asset('/img/books/' . $book->image) }}" style="width: 200px; height: 300px;" alt="Capa do Livro">
                    @else
                        {{-- Placeholder da imagem --}}
                        <img src="{{ asset('https://dunlite.com.au/wp-content/uploads/2019/04/placeholder.jpg') }}" class="img-fluid mb-3" alt="Placeholder">
                    @endif
                    
                    {{-- Título --}}
                    <h2 class="font-weight-bold mb-3">{{ $book->title }}</h2>
                    
                    {{-- Autor --}}
                    <p class="mb-3">{{ $book->author }}</p>
                    
                    {{-- Descrição --}}
                    <h5 class="font-weight-bold mb-0">Descrição</h5>
                    <br>
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-text">{{ $book->description }}</p>
                        </div>
                    </div>
                    <br>
                    
                    {{-- Número de Páginas e Ano de Lançamento --}}
                    <p class="mb-0">Páginas: <b>{{ $book->pages }}</b>  |
                        Data de Lançamento: <b>{{ Carbon::parse($book->release_date)->format('d/m/Y') }}</b></p>
                    <br><br>
                </div>
    </div>
</div>

@endsection