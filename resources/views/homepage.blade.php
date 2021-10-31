
@extends('layouts.defaultlayout')
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
<title> Home pagina</title>
@section('nav')
@endsection
@section('content')
    <h1> Welcome!</h1>
    <p> Welcome to Netflist! The overview of Netflix series.</p>
    <hr>
{{--    Filter function--}}
    <form class="dorpdown-menu" action="#" method="GET" role="search">
        @csrf
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="filter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Filter Genre
        </button>
{{--        For each genre, make an option--}}
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach($genres as $genre)
                <a href="/filter?genre={{$genre->id}}&{{http_build_query(request()->except('genre'))}}" class="dropdown-item" value="{{$genre->id}}">{{ $genre->name }}</a>
            @endforeach
                @if(request('genre'))
                @endif
        </div>
        @if(request('genre'))
            <input type="hidden" name="genre" value="{{request('genre')}}">
            @endif
        </div>
    </form>
    <br>
{{--    Make card for each serie--}}
    <div class="container" id="container">
    @foreach($series as $serie)
    {{-- Check if the serie is toggled on--}}
        @if($serie->status=== 1)
        <div class="card-box">
            <a href="{{ route('serie.show', $serie) }}">
            <div class="image">
                <img src="{{$serie->image}}" alt="foto" width="100%">
            </div>
            <div class="content-box">
                <h2>{{$serie->title}}</h2>
                <div class="detail">
                    <h6>{{$serie->seasons}} Season(s)</h6>
                    <h6>{{$serie->episodes}} Episodes</h6>
                    <h6> Genres: </h6>
                    @foreach($serie->genres as $genre)
                    <h6> {{$genre->name}} </h6>
                    @endforeach
                </div>
            </div>
            </a>
        </div>
    @endif
    @endforeach
@endsection
