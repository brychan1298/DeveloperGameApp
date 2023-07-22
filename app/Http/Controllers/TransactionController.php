<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request){
        if(Transaction::where('user_id',$request->user_id)->where('game_id', $request->game_id)->first()){
            return redirect()->back()->with("error","You already have this game");
        }

        $transaction = new Transaction();
        $transaction->game_id = $request->game_id;
        $transaction->user_id = $request->user_id;
        $transaction->save();

        $user = User::find(auth()->user()->id);
        $user->wallet = $user->wallet - $request->price;
        $user->save();

        return redirect('/buyer');
    }
}
