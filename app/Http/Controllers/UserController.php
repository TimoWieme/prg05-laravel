<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Favorite as Favorite;

class UserController extends Controller
{
    protected $cid;
    public function like($serie_id, $cid){
        $this->cid = auth()->guard('user')->user()->id;

        if (!Favorite::where(['serie_id'=>$serie_id, 'user_id'=>$cid])->exists()){
            Favorite::create(['serie_id'=>$serie_id, 'user_id'=>$cid]);
        }
        return redirect('/');
    }
}
