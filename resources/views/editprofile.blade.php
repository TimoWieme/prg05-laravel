@php
    /**
     * @var \App\Models\User
     **/
@endphp
@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <div class="card">
            <div class="card-header">
                <h1>Edit {{$user->name}}</h1>
            </div>
            <div class="card-body">
                <form action="{{ url('userupdate') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="profilepicture" class="col-sm-2 col-form-label">Profile Picture</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="profilepicture" name="profilepicture" value="{{$user->profilePicture}}">
                        </div>


                    <a href="profile" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
