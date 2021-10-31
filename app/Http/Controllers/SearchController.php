<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Serie;
use App\Models\GenreSerie;
use Illuminate\Http\Request;

class SearchController extends Controller
{


    public function search()
    {
        // Request the word you are trying to search
        $data = request()->validate(['search' => ['required', 'string']]);
        // Search on a word that is similair to the title of the serie
        $series = Serie::where('title', 'like', '%' . $data['search'] . '%')->orWhere('description', 'like', '%' . $data['search'] . '%')->get();


//        $series = Genre::where('genre', 'like', '%' . $data['filter'])->get();

//        dd($series);
        //Return the serie(s) that came out of the search
        return view('search', [
            'search' => $data['search'],
            'series' => $series,
        ]);
    }

}
