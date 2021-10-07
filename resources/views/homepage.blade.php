@extends('layout')
<title> Home pagina</title>
@section('nav')
@endsection
@section('content')
    <h1> Welkom!</h1>
    <p> Welkom op Netflist, het overzicht van Netflix series.</p>
    <hr>

    <div class="container" id="container">
    @foreach($series as $serie)
        <div class="card-box">
            <a href="{{ route('serie.show', $serie) }}">
            <div class="image">
                <img src="{{$serie['image']}}" alt="foto" width="100%">
            </div>
            <div class="content-box">
                <h2>{{$serie['title']}}</h2>
                <div class="detail">
                    <h6>{{$serie['seasons']}} Season(s)</h6>
                    <h6> Genres: </h6>
                    @foreach($serie->genres as $genre)
                    <h6> {{$genre->name}} </h6>
                    @endforeach
                    <h6>{{$serie['episodes']}} Episodes</h6>
                </div>
            </div>
            </a>
        </div>
    @endforeach
@endsection
