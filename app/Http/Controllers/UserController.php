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




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // Define validation rules for user creation here
        ]);

        User::create($request->all());
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            // Define validation rules for user update here
        ]);

        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

}
