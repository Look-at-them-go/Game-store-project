<?php

namespace App\Http\Controllers;
Use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use DB;

class PurchaseController extends Controller
{
    public function buy_game(Request $request){
        $id = $request->game_id;
        Purchase::insert([
            'date'=>date('Y-m-d H:i:s'),
            'user_id'=>Auth::user()->id,
            'game_id'=>$id
        ]);

        return back();
    }
}
