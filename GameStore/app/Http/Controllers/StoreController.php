<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class StoreController extends Controller
{
    
    public function index(){
        $games = DB::table('games')->get();

        return view('store',compact('games'));
    }


}
