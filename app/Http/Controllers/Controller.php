<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use http\Client\Curl\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        // Get all data
        $series = Serie::all();
        $user = User::find(auth()->id());
        return view('homepage', compact('series', 'user'));
    }
}
