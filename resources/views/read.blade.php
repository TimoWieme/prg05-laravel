@php
    /**
     * @var \App\Models\Serie $serie
     **/
@endphp
@extends('layouts.defaultlayout')
<title> Detail pagina</title>
@section('nav')
@endsection
@section('content')
    @if(Route::has('serie.show'))
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 dark:text-white">
                <div  class="text-center">
                    <img style="height: 300px" alt="" src="{{$serie->image}}">
                    <h1>Details of : {{$serie->title }}</h1>
                    <h6>{{$serie->seasons}} Season(s)</h6>
                    <h6>{{$serie->episodes}} Episodes</h6>
                    <h5> Description:</h5>
                    <h6>{{$serie->description}}</h6>
                </div>
            </div>
            <a href="/dashboard" class="btn btn-primary">Back</a>
        </div>
    @else
        <div  class="text-center text-white">
            <h1>Hello to the page of Netflist</h1>
        </div>
    @endif
@endsection
