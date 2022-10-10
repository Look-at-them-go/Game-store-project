<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use DB;

class RatingController extends Controller
{
    public function rate_game(Request $request){
        Rating::insert([
            'score'=>$request->rating,
            'user_id'=>Auth::user()->id,
            'game_id'=>$request->game_id
        ]);

        return back();
    }
}
