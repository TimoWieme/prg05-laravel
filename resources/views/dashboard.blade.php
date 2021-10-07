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
                    <td>{{$serie->id}} </td>
                    <td>{{$serie->title}} </td>
                    <td>{{$serie->image}} </td>
                    <td>{{$serie->year}} </td>
                    <td>{{$serie->seasons}} </td>
                    <td>{{$serie->episodes}} </td>
                    <td>{{$serie->description}} </td>
                    <td>{{$serie->genres}} </td>
                    <td><a href="{{ url('details/'.$serie["id"]) }}">Details</a></td>
                    <td><a href="{{ url('edit-serie/'.$serie["id"]) }}">Edit</a></td>
                    <td><a href="{{ url('delete-serie/'.$serie["id"]) }}">Delete</a></td>
                @endforeach

            </table>
        </div>
    </div>
    </div>
@endsection

