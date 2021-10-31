<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
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
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function index()
    {
        $users = User::all();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show()
    {
            $user = Auth::user();
            $series = Serie::all();
            $genres = Genre::all();
            $favorites = $user->serie()->get();
            // If you have 2 or more favorites
            if(count($favorites) >= 2){
            return view('profile', compact('user', 'series', 'genres', 'favorites'));
        } else {
                abort( response('You need 2 or more favorites to enter this page', 401) );
//                return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|void
     */
    public function edit(Request $request)
    {
        $user = Auth::user();
        $favorites = $user->serie()->get();
        // If favorites = 2 or more, you can enter this page, else abort.
        if(count($favorites) >= 2) {
            return view('editprofile', compact('user', 'favorites'));
        }else{
            abort( response('You need 2 or more favorites to enter this page', 401) );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
            $user = Auth::user();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->profilePicture = $request->input('profilePicture');

            //Save data
            $user->save();
        $favorites = $user->serie()->get();

        if(count($favorites) >= 2) {
            return redirect()->back()->with('status', 'Information Updated Succesfully');
        } else {
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
//    public function destroy($id)
//    {
//        //
//    }
}
