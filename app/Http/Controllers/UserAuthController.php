<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    
    public function showLogin($guard){
        return response()->view('cms.auth.login' , compact('guard'));
    }

    public function adminLogin(Request $request){
        
        $validator = Validator($request->all() , [
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|string|min:4|in:admins,password'
        ] , [
            'email.required' => 'Please Enter Your Email',
            'email.email' => 'Must Be An Email',
            'email.exists' => 'The Email Dos not exist',
            'password.required' => "Please Enter Your Password",
            'password.in' => "Your Password Is Incorrect",
        ]);

        $remember_me = $request->has('remember_me') ? true : false;

        $credintial = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        if(! $validator->fails()){
            if(Auth::guard($request->get('guard'))->attempt($credintial , $remember_me)){
                return response()->json(['icon' => 'success' , 'title' => 'Loged In Successfully'] , 200);
            }

            else{
                return response()->json(['icon' => 'error' , 'title' => 'Login Failed'] , 400);
            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }

        
    }
    public function authorLogin(Request $request){
        
        $validator = Validator($request->all() , [
            'email' => 'required|email|exists:authors,email',
            'password' => 'required|string|min:4|in:authors,password'
        ] , [
            'email.required' => 'Please Enter Your Email',
            'email.email' => 'Must Be An Email',
            'email.exists' => 'The Email Dos not exist',
            'password.required' => "Please Enter Your Password",
            'password.in' => "Your Password Is Incorrect",
        ]);

        $remember_me = $request->has('remember_me') ? true : false;

        $credintial = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        if(! $validator->fails()){
            if(Auth::guard($request->get('guard'))->attempt($credintial , $remember_me)){
                return response()->json(['icon' => 'success' , 'title' => 'Loged In Successfully'] , 200);
            }

            else{
                return response()->json(['icon' => 'error' , 'title' => 'Login Failed'] , 400);
            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }

        
    }

    public function logout(Request $request){
        $guard = auth('admin')->check() ? 'admin' :'author';
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('showlogin' , $guard);
    }
}
