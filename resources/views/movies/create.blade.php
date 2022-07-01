@extends('layouts.main')

@section('title', 'Criar Filme')

@section('content')

<div id="movie-create-container" class="col-md-6 offset-md-3">
  <h1>Crie o seu filme</h1>
  <form action="/movies" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="image">Imagem do Filme:</label>
      <input type="file" id="image" name="image" class="from-control-file">
    </div>
    <div class="form-group">
      <label for="title">Filme:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nome do filme">
    </div>
    <div class="form-group">
      <label for="title">Ano de lançamento:</label>
      <input type="number" class="form-control" id="premierYear" name="premierYear" placeholder="Ano de lançamento">
    </div>
    <div class="form-group">
      <label for="title">Trailer:</label>
      <textarea name="trailer" id="trailer" class="form-control" placeholder="link do trailer do filme"></textarea>
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
    <input type="submit" class="btn btn-primary" value="Adicionar Filme">
  </form>
</div>

@endsection