@extends('layouts.main')

@section('title', 'Editando: ' . $movie->title)

@section('content')

<div id="movie-create-container" class="col-md-6 offset-md-3">
  <h1>Editando: {{ $movie->title }}</h1>
  <form action="/movies/update/{{ $movie->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="image">Imagem do Filme:</label>
      <input type="file" id="image" name="image" class="from-control-file">
      <img src="/img/movies/{{ $movie->image }}" alt="{{ $movie->name }}" class="img-preview">
    </div>
    <div class="form-group">
      <label for="title">Filme:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nome do movie" value="{{ $movie->name }}">
    </div>
    <div class="form-group">
      <label for="title">Ano de lançamento:</label>
      <input type="number" class="form-control" id="premierYear" name="premierYear"  value="{{ $movie->premierYear }}" placeholder="Ano de lançamento">
    </div>
    <div class="form-group">
      <label for="title">Trailer:</label>
      <textarea name="trailer" id="trailer" class="form-control" placeholder="link do trailer do movie">{{ $movie->trailer }}</textarea>
      </div>
    <div class="form-group">
      <label for="title">Selecione os gêneros:</label>
      <div class="form-group">	
        <input type="checkbox" name="genres[]" value="Comédia"> Comédia
      </div>
      <div class="form-group">	
        <input type="checkbox" name="genres[]" value="Terror"> Terror
      </div>
      <div class="form-group">	
        <input type="checkbox" name="genres[]" value="Ação"> Ação
      </div>
      <div class="form-group">	
        <input type="checkbox" name="genres[]" value="Familia"> Familia
      </div>
      <div class="form-group">	
        <input type="checkbox" name="genres[]" value="Documentário"> Documentário
      </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Editar Filme">
  </form>
</div>

@endsection