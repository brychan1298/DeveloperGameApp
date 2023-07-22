<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function create($locale = 'en'){
        if(! in_array($locale, ['en','id'])){
            $locale = 'en';
        }

        App::setLocale($locale);

        return view('developer.add-game');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required|min:10|max:200',
            'price' => 'required',
            'image' => 'required|image|file'
        ]);

        $validate['image'] = $request->file('image')->store('/');
        $validate['user_id'] = auth()->user()->id;

        Game::create($validate);

        return redirect('/developer');
    }

    public function edit($game_id){
        $game = Game::findOrFail($game_id);

        return view('developer.edit-game', compact('game'));
    }

    public function update(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required|min:10|max:200',
            'price' => 'required',
            'image' => 'image|file'
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validate['image'] = $request->file('image')->store('/');
        }

        Game::find($request->game_id)->update($validate);

        return redirect('/developer');
    }

    public function show(){
        $games = Game::all();

        return view('buyer.store', compact('games'));
    }
}
