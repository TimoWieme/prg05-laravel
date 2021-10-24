@php
/**
 * @var \App\Models\Serie $serie
 **/
@endphp
@extends('layout')
<title> Detail pagina</title>
@section('nav')
@endsection
@section('content')
    @if(Route::has('serie.show'))
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 dark:text-white">
                <div  class="text-center">
                    <img style="height: 300px" alt="" src="{{$serie->image}}">
                    <h1>Details van : {{$serie->title }}</h1>
                    <h6>{{$serie->seasons}} Seizoen(en)</h6>
                    <h6>{{$serie->episodes}} Afleveringen</h6>
                    <h5> Beschrijving:</h5>
                    <h6>{{$serie->description}}</h6>

                </div>
            </div>
        </div>
    @endif

    <div class="favorite">
{{--        Check if the serie is favorited--}}
{{--        @if($serie->user()->find(Auth::id()))--}}
{{--            <form action="{{ route('removeFavorite', $serie)  }}" method="post" class="text-left" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <div class="form-group row">--}}
{{--                    <div class="col-sm-9 text-center">--}}
{{--                        <input type="id" id="id" name="id" value="{{$serie->id}}" hidden>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row justify-content-center text-center">--}}
{{--                    <div class="col-sm-2">--}}
{{--                        <button type="submit" class="btn btn-secondary mb-2">Remove Favorite</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        @elseif($serie->user()->find(Auth::id()) === null)--}}
{{--            <form action="{{ route('addFavorite', $serie)  }}" method="post" class="text-left" enctype="multipart/form-data">--}}
{{--                @csrf--}}
{{--                <div class="form-group row ">--}}
{{--                    <div class="col-sm-9">--}}
{{--                        <input type="id" id="id" name="id" value="{{$serie->id}}" hidden>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row justify-content-center">--}}
{{--                    <div class="col-sm-2 text-center">--}}
{{--                        <button type="submit" class="btn btn-danger mb-2">Add Favorite</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        @endif--}}
{{--    </div>--}}
@endsection
