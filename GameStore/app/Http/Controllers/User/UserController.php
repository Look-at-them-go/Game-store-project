<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Use App\Models\Game;

use DB;

class UserController extends Controller
{
    public function library(){
        $games = Game::all();
        $p_games = DB::table('purchases')
        ->where('user_id', '=', Auth::user()->id)
        ->get();

        return view('library',compact('p_games','games'));
    }

}
