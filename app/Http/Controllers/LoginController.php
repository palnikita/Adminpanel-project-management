<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Add this to use DB facade
use Illuminate\Support\Facades\Hash; // Add this to use Hash facade


class LoginController extends Controller
{


    public function showLoginForm()
    {
        return view('auth.login');
    }




    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        $user = DB::table('teams')->where('email', $credentials['email'])->first();
    
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Manually create a user object for Auth
            Auth::loginUsingId($user->id);
    
            $success['name'] = $user->name;
                
    
            return redirect()->route('index');
        } else {
            return redirect()->back()->with('error', 'Unauthorized');
        }
    }
public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login'); // Redirect to the home page or any other page after logout
    }

}
