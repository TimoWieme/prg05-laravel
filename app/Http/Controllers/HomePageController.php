<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Serie;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class HomePageController extends Controller
{
    public function index(){
        // Get all series from Database
        $series = Serie::all();
        // Get all genres
        $genres = Genre::all();
        $series = Serie::with('genres')->get();
        // Return view with homepage with series and genres
        return view('homepage', compact('series', 'genres'));
    }

}
