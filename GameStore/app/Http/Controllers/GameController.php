<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Models\Comment;
Use App\Models\Game;
Use App\Models\Purchase;
Use App\Models\Rating;
Use App\Models\Genre;
Use App\Models\User;

use DB;

class GameController extends Controller
{
    public function index($id){
        $game = Game::find($id);
        $genres = Genre::all();
        $users = User::all();

        if(Auth::check()){
            $bought = DB::table('purchases')
            ->where('user_id', '=', Auth::user()->id)
            ->where('game_id', '=', $id)->get();

            $rated = DB::table('ratings')
            ->where('user_id', '=', Auth::user()->id)
            ->where('game_id', '=', $id)->get();
        } else {
            $bought = 0;
            $rated = 0;
        }
        

        $comments = DB::table('comments')
        ->where('game_id', '=', $id)->get();

        $score = DB::table('ratings')
        ->where('game_id', '=', $id)
        ->avg('score');

        $downloads = DB::table('purchases')
        ->where('game_id', '=', $id)
        ->count('user_id');

        return view('game',compact('game', "genres",'bought','rated','comments','score','downloads','users'));
    }

    

    
}
