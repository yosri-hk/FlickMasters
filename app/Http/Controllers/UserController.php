<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;  // zidtha lel authentification

use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request) { 
        $data=$request->validate([
            "name"=>"required|string|between:5,20",
            "email"=>"required|string|email",
            "password"=>"required|string",
        ]);

        $data['password'] = bcrypt($data['password']);

        $user=User::create($data);

        return redirect(route('home'))->with("status","registered successfully");

    }


    public function login(Request $request)
    {
    $credentials = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials, $request->has('remember'))) {
        
        $user = Auth::user(); 

        if ($user->isAdmin) {
           return redirect('/admin');
        } else {
            return redirect(route('session'))
            ->with('user_id', $user->id);
        }
    }

    return redirect('/');
   }


   public function session() {
    return view("session");
   }


}
