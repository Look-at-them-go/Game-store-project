<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\File;

Use App\Models\Genre;
Use App\Models\Game;
Use App\Models\Purchase;
Use App\Models\User;
Use App\Models\Comment;

use DB;

class ManagerController extends Controller
{

    public function index(){
        return view('manager.manager_panel');
    }

    public function user_data(){
        $users = User::all();
        
        return view('manager.manager_view_users',compact('users'));
    }

    public function activity_data($id){
        $games = Game::all();
        $activity = DB::table('purchases')
        ->join('users','user_id', '=', 'users.id')
        ->where('user_id', '=', $id)
        ->get();
        $comments = DB::table('comments')
        ->where('user_id', '=', $id)
        ->get();

        return view('manager.manager_view_user_data',compact('games','activity','comments'));
    }
}
