@php
    /**
     * @var \App\Models\Serie $serie
     **/
@endphp

@extends('layouts.defaultlayout')
@section('content')
    <div class="container">
        @if(session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <div class="add-form">
            <div class="form-header">
                <h1>Add New Serie</h1>
            </div>
            <div class="form-body">
                <form action="{{ url('add') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Serie title</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Serie image</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="image" name="image" placeholder="Image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="year" class="col-sm-2 col-form-label">Serie year </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="year" name="year" placeholder="Year">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="seasons" class="col-sm-2 col-form-label">Serie seasons</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="seasons" name="seasons" placeholder="Seasons">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="episodes" class="col-sm-2 col-form-label">Serie episodes</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="episodes" name="episodes" placeholder="Episodes">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Serie description</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="episodes" name="description" placeholder="Description">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Serie Status</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="status" name="status" placeholder="Status">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Serie</button>
                    <a href="/dashboard" class="btn btn-primary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
