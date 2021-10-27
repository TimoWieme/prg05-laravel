@php
/**
 * @var \App\Models\Serie $serie
 **/
 @endphp

{{--@if(Auth::user()->role!= 1)--}}

{{--@endif--}}

@extends('layouts.defaultlayout')
@section('scripts')
{{--Ajax loading in--}}
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

{{--Cloudlfare Toggle--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"> </script>
@endsection
@section('content')

    <h1> Dashboard page of : {{ Auth::user()->name }}</h1>
    <div class="position-relative text-left">
        <button>
            <a href="/add">Add Serie</a>
        </button>
    </div>
    <div class="card">
        <div class="dashboard">
            <table class="table table-hover">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titel</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Year</th>
                    <th scope="col">Seasons</th>
                    <th scope="col">Episodes</th>
                    <th scope="col">Description</th>
                    <th scope="col">Genres</th>
                    <th scope="col">Status</th>
                    <th scope="col">Details</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>

                @foreach($series as $serie)
                    <tr>
                    <td data-id="{{ $serie->id }}">{{$serie->id}} </td>
                    <td data-id="{{ $serie->id }}">{{$serie->title}} </td>
                    <td data-id="{{ $serie->id }}"><img src="{{$serie->image}}" alt="" height="50px" width="50px"> </td>
                    <td data-id="{{ $serie->id }}">{{$serie->year}} </td>
                    <td data-id="{{ $serie->id }}">{{$serie->seasons}} </td>
                    <td data-id="{{ $serie->id }}">{{$serie->episodes}} </td>
                    <td data-id="{{ $serie->id }}">{{$serie->description}} </td>
                        <td>
                    @foreach($serie->genres as $genre)
                        {{$genre->name}}
                        <br>
                    @endforeach
                    <td data-id="{{ $serie->id }}">
                            <input type="checkbox" data-id="{{ $serie->id }}" name="status" class="js-switch" {{ $serie->status == 1 ? 'checked' : '' }}>
                        </td>
                    <td><a href="{{ url('read/'. $serie["id"]) }}">Details</a></td>
                    <td><a href="{{ url('edit/'.$serie["id"]) }}">Edit</a></td>
                    <td><a href="{{ url('delete/'.$serie["id"]) }}">Delete</a></td>

                </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
    </script>
    <script src="{{asset("js/main.js")}}"></script>
@endsection

