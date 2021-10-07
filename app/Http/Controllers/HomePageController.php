<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class HomePageController extends Controller
{
    public function index(){
        // Get all series from Database
        $series = Serie::all();
//        $series = Serie::with('genres')->get();
//        dd($series);
        return view('homepage', compact('series'));
    }



}
