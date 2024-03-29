<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function check()
    {
        $email=session('email');
        if(isset($email)){
            $role = DB::table('users')
            ->where('email',$email)
            ->pluck('role')
            ->first();
            if($role=="guru"){
                return redirect('/home/guru');
            }elseif($role=="siswa"){
                return redirect('/home');
            }elseif($role=="admin"){
                return redirect('/managementUser/guru');
            }
        }
        return redirect('/login');
    }
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        
        $email=$request->email;
        $role = DB::table('users')
        ->where('email', $email)
        ->pluck('role')
        ->first();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session(['email' => $email]);
            if($role=='admin'){
                return redirect('/managementUser/guru');
            }else if($role=='guru'){
                return redirect('/home/guru');
            }else{
                return redirect('/home');
            }
        }
        return back()->with('loginError','Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
