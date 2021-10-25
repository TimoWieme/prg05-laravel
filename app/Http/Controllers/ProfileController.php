<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $users = User::all();
        return redirect('/');
    }

    public function show(User $user)
    {
        $user = User::find(auth()->id());
        $series = Serie::all();
        if (auth()->user()){
            $user = User::find($user->id);
            return view('users.profile', compact('user', 'series'));
        }else{
            return redirect('/');
        }
    }

    public function update(Request $request,User $user)
    {
        if (auth()->user()){
            $user = User::find($user->id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            //        save data
            $user->save();
            return redirect()->route('user.show', $user)->with('status', "Profile Updated");
        }else{
            return redirect()->route('/');
        }
    }
}
