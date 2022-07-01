@extends('layouts.main')

@section('title', $movie->name)

@section('content')

  <div class="col-md-10 offset-md-1">
    <div id="image-container" class="col-md-12">
        <div id="genero">    
          <h4>Gênero:</h4>
          <ul id="items-list">
          @foreach($movie->genres as $item)
            <li><ion-icon name="play-outline"></ion-icon> <span>{{ $item }}</span></li>
          @endforeach
          </ul>
        </div>
        <img src="/img/movies/{{ $movie->image }}" class="img-fluid" alt="{{ $movie->title }}">
        <h1>{{ $movie->name }}</h1>
        <p class="movie-city">{{ $movie->premierYear }} HD </p>
       
        <a href="{{ $movie->trailer }}"class="movie-description">
          <button type="button"  class="btn btn-outline-danger">Assistir ao Trailer</button>
        </a>
    </div>
  </div>

@endsection