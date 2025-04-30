<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller {
    public function showRegister() { return view('auth.register'); }

    public function register(Request $request) {
        $request->validate(['name'=>'required','email'=>'required|email','password'=>'required|min:6']);
        DB::table('users')->insert([
            'name' => strip_tags($request->name),
            'email' => strip_tags($request->email),
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/login')->with('success', 'Registered! Login now.');
    }

    public function showLogin() { return view('auth.login'); }

    public function login(Request $request) {
        $user = DB::table('users')->where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user', $user);
            return redirect('/events');
        }
        return back()->with('error', 'Invalid credentials');
    }

    public function logout() {
        Session::forget('user');
        return redirect('/login');
    }
}