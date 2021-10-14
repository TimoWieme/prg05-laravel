@php
/**
 * @var \App\Models\Serie $serie
 **/
 @endphp

@if(Auth::user()->role!= 1)

@endif

@extends('layout')

@section('content')
    <h1> Dashboard pagina van : {{ Auth::user()->name }}</h1>
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
                    <th scope="col">Foto</th>
                    <th scope="col">Jaar</th>
                    <th scope="col">Seizoenen</th>
                    <th scope="col">Afleveringen</th>
                    <th scope="col">Beschrijving</th>
                    <th scope="col">Genres</th>
                    <th colspan="2"></th>
                </tr>

                @foreach($series as $serie)
                    <tr>
                    <td>{{$serie->id}} </td>
                    <td>{{$serie->title}} </td>
                    <td><img src="{{$serie->image}}" alt="" height="50px" width="50px"> </td>
                    <td>{{$serie->year}} </td>
                    <td>{{$serie->seasons}} </td>
                    <td>{{$serie->episodes}} </td>
                    <td>{{$serie->description}} </td>
                        <td>
                    @foreach($serie->genres as $genre)
                        {{$genre->name}}
                        <br>
                    @endforeach
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

