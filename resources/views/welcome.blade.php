@extends('layouts.main')

@section('title', 'TRAILERFLIX')

@section('content')


    <!-- titulo -->
    <div class="showcase">
        <div class="showcase-top">
            <!-- <img src="/img/logo.png" alt="Netflix Logo">
            <a href="#" class="btn btn-rounded">Sign In</a> -->
        </div>
        <div class="showcase-content">
            <h1>Assista trailers de filmes, TV shows e mais.</h1>
            <!-- <h3>Tudo na TRAILERFLIX, por apenas R$3.5.</h3> -->
            <p>Quer buscar por um filme? Confira nosso catálogo baixo</p>
            
            <form action="/" method="GET">
                <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
                <!-- <a href="#" class="btn btn-lg">GET STARTED ></a> -->
            </form>
        </div>
    </div>
    <!-- titulo -->

    <!-- Carrosel -->
    <div class="carrosel">
        <div class="contain">
            @if($search)
            <h3>Buscando por: {{ $search }}</h3>
            @else
            <h3>Veja os títulos disponíveis</h3>
            @endif
            @if(count($movies) == 0 && $search)
            <p>Não foi possível encontrar nenhum filme com {{ $search }}! <a href="/">Ver todos</a></p>
            @elseif(count($movies) == 0)
                <p>Não há filmes disponíveis</p>
            @endif

        <div class="row">
            <div class="row__inner">


                @foreach($movies as $movie)            
                    <div class="tile">
                     <a href="/movies/{{ $movie->id }}">
                            <div class="tile__media">
                                <img class="tile__img" src="/img/movies/{{ $movie->image }}" alt=""  />
                            </div>
                            <div class="tile__details">
                                <div class="tile__title">
                                {{ $movie->name }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        </div>
    </div>
    <!-- Carrosel -->
<div id="search-container" class="col-md-12">
  
    
</div>


@endsection