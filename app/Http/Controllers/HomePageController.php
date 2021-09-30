<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){

        // Get all series from Database
//        $series = Serie::with('genres')->get();
//        dd($series);
        return view('homepage', compact('series'));
    }

}
