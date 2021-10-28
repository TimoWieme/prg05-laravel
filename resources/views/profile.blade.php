@php
use App\Models\User;
use App\Models\Serie;
@endphp

@extends('layouts.defaultlayout')
<title> Profile</title>
@section('nav')
@endsection

@section('content')

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 text-center text-white">
                <div class="container">
                    <h1>Your Profile</h1>
                    <div class="image">
                        <img src="{{$user->profilePicture}}" alt="">
                    </div>
                    <div class="col text-secondary">
                        <h4> Name: {{$user->name}} </h4>
                    </div>
                    <div class="col text-secondary">
                        <h4> {{$user->email}} </h4>
                    </div>
                    <div class="row">
                        <div class="align-items-center text-dark">
                            <a class="btn btn-info " href="{{url('editprofile')}}">Edit Profile information</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="col mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="align-items-center mb-3">My Favorites</h6>
{{--                @dd($favorites)--}}
                        <div class="container" id="container">
                            @foreach($favorites as $serie)
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
                                                    <h6> Genres: </h6>
                                                    @foreach($serie->genres as $genre)
                                                        <h6> {{$genre->name}} </h6>
                                                    @endforeach
                                                    <h6>{{$serie->episodes}} Episodes</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
            </div>
        </div>
    </div>
    @endsection

