<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
    // Get all series from Database
    $series = Serie::all();
//        $series = Serie::with('genres')->get();
//        dd($series);
    return view('dashboard', compact('series'));
    }
}
