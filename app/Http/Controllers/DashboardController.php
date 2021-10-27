<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){
        // Check if user is admin, otherwise redirect
        if(auth()->guest() || auth()->user()->role != '1'){
            // Abort session, give error
            abort(\Symfony\Component\HttpFoundation\Response::HTTP_FORBIDDEN);
        }

    // Get all series from Database
    $series = Serie::all();
//        $series = Serie::with('genres')->get();
//        dd($series);
    return view('dashboard', compact('series'));
    }
}
