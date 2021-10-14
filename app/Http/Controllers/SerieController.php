<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $series = Serie::all();

        return view('serie', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    public function read($id){
        $serie = Serie::find($id);
        return view('read', ['serie' => $serie]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        return redirect()->back()->with('status','Serie Added Succesfully');
//        $characters = Character::all();
//        return redirect('/overview');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Request $request, Serie $serie)
    {
        return view('serie', compact('serie'));

//        dd($serie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serie = Serie::find($id);
        return view('edit', ['serie' => $serie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $serie = Serie::find($id);
        $serie->title= $request->input('title');
        $serie->image = $request->input('image');
        $serie->year = $request->input('year');
        $serie->seasons = $request->input('seasons');
        $serie->episodes = $request->input('episodes');
        $serie->description = $request->input('description');
        $serie->status = $request->input('status');
        $serie->update();
        return redirect()->back()->with('status','Serie Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serie = Serie::find($id);
        $serie->delete();
        return redirect()->back()->with('status','Serie Deleted Successfully');
    }
}
