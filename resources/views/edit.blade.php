@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <div class="card">
            <div class="card-header">
                <h1>Edit {{ $serie["title"] }}</h1>
            </div>
            <div class="card-body">
                <form action="{{ url('update/'.$serie["id"]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Serie title</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="title" name="title" value="{{ $serie["title"] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Serie image</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="image" name="image" value="{{ $serie["image"] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="year" class="col-sm-2 col-form-label">Serie year</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="year" name="year" value="{{ $serie["year"] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="seasons" class="col-sm-2 col-form-label">Serie seasons</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="seasons" name="seasons" value="{{ $serie["seasons"] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="episodes" class="col-sm-2 col-form-label">Serie episodes</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="episodes" name="episodes" value="{{ $serie["episodes"] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Serie description</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="description" name="description" value="{{$serie["description"] }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Serie status</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="status" name="status" value="{{ $serie["status"] }}">
                        </div>
                    </div>

                    <a href="/dashboard" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
