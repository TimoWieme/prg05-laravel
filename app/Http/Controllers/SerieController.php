<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('search', [
            'series' => Serie::latest()->filter(request(['search', 'genre']))->get()->sortBy('id'),
            'genres' => Genre::all(),
            'currentGenre' => Genre::firstWhere('id', request('genre')),
            'user' => User::find(auth()->id())
        ]);
    }


    public function showGenre(Request $request, Genre $genres)
    {
        $genres = Genre::all();
        return view('serie', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        // If user has role 1 (admin role)
        if (auth()->user()->role === 1) {
            $genres = Genre::all();
            $user = User::find(auth()->id());
            return view('add', compact('genres', 'user'));
        } else {
            return redirect('/');
        }
    }

    public function read($id)
    {
        // If user has role 1 (admin role)
        if (auth()->user()->role === 1) {
            $serie = Serie::find($id);
            return view('read', ['serie' => $serie]);
        } else {
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // If user has role 1 (admin role)
        if (auth()->user()->role === 1) {
            $serie = new Serie;
            $serieGenres = $request->input('genre_id');
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
        } else {
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Serie $serie
     * @return Application|Factory|View
     */

    public function show(Request $request, Serie $serie)
    {
        $genres = Genre::all();
        $user = User::find(auth()->id());
        return view('serie', compact('serie', 'genres', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Serie $serie
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        // If user has role 1 (admin role)
        if (auth()->user()->role === 1) {
            $serie = Serie::find($id);
            return view('edit', ['serie' => $serie]);
        }
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        // If user has role 1 (admin role)
        if (auth()->user()->role === 1) {
            $serie = Serie::find($id);
            $serie->title = $request->input('title');
            $serie->image = $request->input('image');
            $serie->year = $request->input('year');
            $serie->seasons = $request->input('seasons');
            $serie->episodes = $request->input('episodes');
            $serie->description = $request->input('description');
            $serie->status = $request->input('status');
            //Save data
            $serie->save();
            //Detach old relations
            $serie->genres()->detach();
            //Atach new relations
            $serie->genres()->attach($request->input('genre_id'));
            return redirect()->back()->with('status', 'Serie Updated Succesfully');
        } else {
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Serie $serie
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        // If user has role 1 (admin role)
        if (auth()->user()->role === 1) {
            $serie = Serie::find($id);
            $serie->genres()->detach();
            $serie->delete();
            return redirect()->back()->with('status', 'Serie Deleted Successfully');
        } else {
            return redirect('/');
        }
    }

    public function addFavorite(Request $request, Serie $serie): RedirectResponse
    {
        // Find user ID
        $user = User::find(auth()->id());
        // Request serie ID
        $serie = Serie::find($request->input('id'));
        $serie->save();
        // Attach user to the serie
        $serie->user()->attach($user);
        return redirect()->back()->with('status', 'Serie added to favorites');
    }

    public function removeFavorite(Request $request, Serie $serie): RedirectResponse
    {
        // Find user id
        $user = User::find(auth()->id());
        // Request serie id
        $serie = Serie::find($request->input('id'));
        $serie->save();
        // Remove user from serie
        $serie->user()->detach($user);
        return redirect()->back()->with('status', 'Serie removed from favorites');
    }

    public function updateStatus(Request $request): \Illuminate\Http\JsonResponse
    {
        $serie = Serie::findOrFail($request->serieid);
        $serie->status = $request->status;
        $serie->save();

        return response()->json(['status' => 'Serie status updated successfully.']);
    }

}
