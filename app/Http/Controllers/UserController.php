<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function developerIndex(){
        $games = Game::where('user_id',auth()->user()->id)->get();

        return view('developer.home', compact('games'));
    }

    public function buyerIndex(){
        $games = Transaction::where('user_id',auth()->user()->id)->get();

        return view('buyer.home', compact('games'));
    }

    public function topup(Request $request){
        $user = User::find(auth()->user()->id);

        $user->wallet = $user->wallet + $request->wallet;
        $user->update();

        return redirect('/buyer');
    }
}
