<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index(Request $request){
        // dd($request->ip());
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            Alert::success('Success', 'Anda berhasil login');
            return redirect()->intended('/');
        }

        return back()->with('error', 'Login gagal !');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json([
            'message' => 'Berhasil logout'
        ]);
    }

    // public function dummy_login()
    // {
    //     return view('auth.dummy_login');
    // }

    // public function check_login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'username' => 'required',
    //         'password' => 'required',
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         return response()->json([
    //             'success' => true,
    //         ], 200);
    //     } else {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Login gagal !',
    //         ], 401);
    //     }
    // }
}
