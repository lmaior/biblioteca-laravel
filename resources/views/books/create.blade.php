@extends('layouts.main')

@section('title', "Cadastrar livro")
@section('content')

<div class="container container-custom mt-5">
    <h1 class="text-center">Adicionar Livro</h1>
    <form action="/" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Digite o título do livro" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Digite a descrição do livro"></textarea>
        </div>
        <div class="form-group">
            <h6>Adicione um autor</h6>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="selected_authors[]">
            <option selected disabled>Escolha o autor</option>
            @foreach($authors as $author)
            <option value={{ $author->id }}>{{ $author->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
            <h6>Adicione um autor</h6>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="selected_authors[]">
            <option selected disabled>Escolha o autor</option>
            @foreach($authors as $author)
            <option value={{ $author->id }}>{{ $author->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
            <h6>Adicione um autor</h6>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="selected_authors[]">
            <option selected disabled>Escolha o autor</option>
            @foreach($authors as $author)
            <option value={{ $author->id }}>{{ $author->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
            <label for="pages">Número de Páginas</label>
            <input type="number" class="form-control" id="pages" name="pages" placeholder="Digite o número de páginas" required>
        </div>
        <div class="form-group">
            <label for="release_date">Escolha uma data:</label>
            <input type="date" class="form-control" id="release_date" name="release_date">
        </div>
        <div class="form-group">
            <label for="image">Imagem da capa:</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="text-center custom-margin">
            <button type="submit" class="btn btn-primary">Adicionar Livro</button>
        </div>
    </form>
</div>

@endsection
