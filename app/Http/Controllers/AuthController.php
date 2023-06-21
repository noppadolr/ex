<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function  AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    //End AdminLogout method

    public  function  AdminLoginView()
    {
        return view('auth.c_login');

    }
    public function authenticate(Request $request)
    {
        $validate = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);




        $user = User::where('email',"=",$request->email)->first();
        if($user) {
            if(Hash::check($request->password,$user->password)){
                if(Auth::attempt($validate))
                {
                    $request->session()->regenerate();
                    return redirect()->intended('dashboard');
                }

            }
            else {

                return back()->with('pfail','Password is not match') ->with('email',$request->email);

            }


        } else

        { return back()->with('efail','This Username '.$request->email.' is not Register')
           ;}
    }
//    End AdminLoginView method
}
