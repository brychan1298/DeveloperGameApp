<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users|email:dns',
            'gender' => 'required',
            'role' => 'required'
        ]);

        $validate['password'] = bcrypt($validate['password']);
        User::create($validate);

        return redirect('/login')->with('registerSuccess','You success register');
    }

    public function login(Request $request){
        $validate = $request->validate([
            'password' => 'required',
            'email' => 'required'
        ]);

        if(Auth::attempt($validate)){
            $request->session()->regenerate();

            $role = auth()->user()->role;
            if($role == "developer"){
                return redirect('/developer');
            }else{
                return redirect('/buyer');
            }
        }

        return redirect()->back()->with('loginError', "Login Failed!");
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
