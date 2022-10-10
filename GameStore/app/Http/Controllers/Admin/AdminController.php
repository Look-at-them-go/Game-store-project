<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\File;

Use App\Models\Genre;
Use App\Models\Game;
Use App\Models\Purchase;
Use App\Models\User;
Use App\Models\Comment;
Use App\Models\Rating;

use DB;
use PDF;


class AdminController extends Controller
{

    public function index(){
        return view('admin.admin_panel');
    }

    public function game_data(){
        $genres = Genre::all();
        $games = Game::all();
        return view('admin.admin_add_game',compact('games','genres'));
    }

    public function genre_data(){
        $genres = Genre::all();
        return view('admin.admin_add_genre',compact('genres'));
    }

    public function modify_data(){
        $genres = Genre::all();
        $games = Game::all();
        return view('admin.admin_modify_games',compact('games','genres'));
    }

    public function user_data(){
        $users = User::all();
        
        return view('admin.admin_view_users',compact('users'));
    }

    public function activity_data($id){
        $games = Game::all();
        $user = User::find($id);
        $activity = DB::table('purchases')
        ->join('users','user_id', '=', 'users.id')
        ->where('user_id', '=', $id)
        ->get();
        $comments = DB::table('comments')
        ->where('user_id', '=', $id)
        ->get();

        return view('admin.admin_view_user_data',compact('games','activity','comments','user'));
    }


    public function admin_form(){
        return view('admin.admin_admin_form');
    }

    public function manager_form(){
        return view('admin.admin_manager_form');
    }

    public function add_game(Request $request){

        $request->validate([
            'name'=>'required|unique:games',
            'publisher'=>'required',
            'price'=>'required',
            'description'=>'required',
            'picture'=>'required',
            'genre_id'=>'required'
        ]);


        //$path = $request->file('picture')->store('images');
        $p_name = $request->name . "." . $request->picture->extension();
        $request->picture->move(public_path('images'),$p_name);

        Game::insert([
            'name'=>$request->name,
            'publisher'=>$request->publisher,
            'price'=>$request->price,
            'description'=>$request->description,
            'picture'=>$p_name,
            'genre_id'=>$request->genre_id
        ]);

        return redirect()->back()->with('success', 'SUCCESS');
    }

    public function add_genre(Request $request){

        $request->validate([
            'name'=>'required|unique:genres',
        ]);

        Genre::insert([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'SUCCESS');

    }

    public function edit_game_view($id){
        $genres = Genre::all();
        $game = Game::find($id);
        return view('admin.admin_edit_game',compact('game','genres'));
    }

    public function edit_game(Request $request){
        $data = Game::find($request->id);
        $data->name=$request->name;
        $data->publisher=$request->publisher;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->genre_id=$request->genre_id;
        if(is_null($request->picture)){
            $data->picture=$data->picture;
        } else {
            $data->picture=$request->picture;
        }
        $data->timestamps = false;
        $data->save();
        return redirect()->back()->with('success', 'SUCCESS');
    }

    public function delete_game($id){

        Game::destroy($id);
        return redirect()->back()->with('success', 'SUCCESS');
    }

    public function add_admin(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'pass'=>'required',
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->pass),
            'role_id'=> "1",
        ]);

        return redirect()->back()->with('success', 'SUCCESS');

    }

    public function add_manager(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'pass'=>'required',
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->pass),
            'role_id'=> "2",
        ]);

        return redirect()->back()->with('success', 'SUCCESS');

    }

    public function export_user($id){
        $activity = DB::table('purchases')
        ->join('users','user_id', '=', 'users.id')
        ->where('user_id', '=', $id)
        ->get();
        $games = Game::all();

        $pdf = PDF::loadView('pdf.users_pdf',array('activity'=>$activity),array('games'=>$games));

        return $pdf->stream();
    }

}
