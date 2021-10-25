@extends('layout')
<title> Home pagina</title>
@section('nav')
@endsection
@section('content')
    <h1> Welkom!</h1>
    <p> Welkom op Netflist, het overzicht van Netflix series.</p>
    <hr>

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 text-center text-white">
            <div class="container">
                <h1>Your Profile</h1>
                <div class="main-body text-dark">
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card-body">
                                <div class="flex-column align-items-center image-box">
                                    <hr>
                                    <div class="row">
                                        <div class="col text-light">
                                            <h6 class="mb-0">Name</h6>
                                        </div>
                                        <div class="col text-secondary">
                                            {{$users->name}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col text-light">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col text-secondary">
                                            {{$user->email}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12 text-dark">
                                            <a class="btn btn-info " href="{{route('profile.edit', $user)}}">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection
