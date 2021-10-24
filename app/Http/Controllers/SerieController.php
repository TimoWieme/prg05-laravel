<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $series = Serie::all();
        $user = User::find(auth()->id());
        return view('serie', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        if (auth()->user()->role === 1) {
            $genres = Genre::all();
            return view('add', compact('genres'));
        } else {
            return redirect('/');
        }
    }

    public function read($id)
    {
        $serie = Serie::find($id);
        return view('read', ['serie' => $serie]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serie = new Serie;
        $serie->title = $request->input('title');
        $serie->image = $request->input('image');
        $serie->year = $request->input('year');
        $serie->seasons = $request->input('seasons');
        $serie->episodes = $request->input('episodes');
        $serie->description = $request->input('description');
        $serie->status = $request->input('status');
        $serie->save();
//        $serie->Genres()->attach($request->input('id'));
        return redirect()->back()->with('status', 'Serie Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function show(Request $request, Serie $serie)
    {
        return view('serie', compact('serie'));

//        dd($serie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->role === 1) {
            $serie = Serie::find($id);
            return view('edit', ['serie' => $serie]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->role === 1) {
            $serie = Serie::find($id);
            $serie->title = $request->input('title');
            $serie->image = $request->input('image');
            $serie->year = $request->input('year');
            $serie->seasons = $request->input('seasons');
            $serie->episodes = $request->input('episodes');
            $serie->description = $request->input('description');
            $serie->status = $request->input('status');
            $serie->update();
            return redirect()->back()->with('status', 'Serie Updated Succesfully');
        } else {
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->role === 1) {
            $serie = Serie::find($id);
            $serie->delete();
            return redirect()->back()->with('status', 'Serie Deleted Successfully');
        } else {
            return redirect('/');
        }
    }

    public function addFavorite(Request $request, Serie $serie)
    {
        $user = User::find(auth()->id());
        $serie = Serie::find($request->input('id'));
        $serie->save();
        $serie->user()->attach($user);
        return redirect()->back()->with('status', 'Serie added to favorites');
    }

    public function removeFavorite(Request $request, Serie $serie)
    {
        $user = User::find(auth()->id());
        $serie = Serie::find($request->input('id'));
        $serie->save();
        $serie->user()->detach($user);
        return redirect()->back()->with('status', 'Serie removed from favorites');
    }
}
