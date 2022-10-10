<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
Use App\Models\Comment;
use Illuminate\Http\Request;

use DB;

class CommentController extends Controller
{
    public function comment(Request $request){
        $id = $request->game_id;
        $request->validate([
            'comment'=>'required',
        ]);

        Comment::insert([
            'comment'=>$request->comment,
            'user_id'=>Auth::user()->id,
            'game_id'=>$id,
        ]);

        return back()->with('success');
    }

    public function comment_delete($id)
    {
        Comment::destroy($id);
        return redirect()->back()->with('success', 'SUCCESS');
    }
}
