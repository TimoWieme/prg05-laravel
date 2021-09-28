<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){

        // Get all series from Database
        $series = Series::all();
        dd($series);
        return view('homepage');
    }

}
