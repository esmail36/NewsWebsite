<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use App\Providers\RouteServiceProvider;
use Dotenv\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VisitorController extends Controller
{

    // Statr Auth Functions

    public function viewLogin(){
        return response()->view('website.auth.login');
    }

    public function viewRegister(){
        return response()->view('website.auth.register');
    }

    public function visitorLogin(Request $request){
        
        $validator = Validator($request->all() , [
            'email' => 'required|email|exists:visitors,email',
            'password' => 'required|string|min:4|in:visitors,password'
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
            if(Auth::guard($request->get('visitors'))->attempt($credintial , $remember_me)){
                return response()->json(['icon' => 'success' , 'title' => 'Loged In Successfully'] , 200);
                return ['redirect' => route('website.home')];
            }

            else{
                return response()->json(['icon' => 'error' , 'title' => 'Login Failed'] , 400);
            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }

        
    }

    public function register(Request $request){
        $validator = Validator($request->all() , [
            'email' => ['required' , 'string' , 'max:255'],
            'password' => ['required' , 'confirmed']
        ] , [

        ]);

        if(! $validator->fails()){

            $visitors = new Visitor();
            $visitors->full_name = $request->get('full_name');
            $visitors->password = Hash::make($request->get('password'));
            $visitors->email = $request->get('email');
            $visitors->phone = $request->get('phone');
            $visitors->date_of_birth = $request->get('date_of_birth');

            $isSaved = $visitors->save();

            if($isSaved){
                // return ['redirect' => route('website.home')];
                event(new Registered($visitors));

                    Auth::login($visitors);

            return redirect(RouteServiceProvider::HOME);
            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }
    }

    public function logout(Request $request){
        Auth::guard('visitor')->logout();
        $request->session()->invalidate();
        return redirect()->route('website.home');
        
    }

    // End Auth Functions

    public function showProfile()
    {
        $visitors = Auth::user();
        return response()->view('website.profile.profile' , compact('visitors'));
    }

    public function editProfile()
    {
        $visitors = Visitor::findOrFail(Auth::guard('visitor')->id());
        return response()->view('website.profile.editprofile' , compact('visitors'));
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator($request->all() , [
            'full_name' => 'required|min:3|string',
            'email'=>"required|string|min:7",
            'phone'=>"required|string",
            // 'image'=>"max:2048|mimes:jpeg,png,jpg,gif,svg,webp",
            'image'=> 'required',

            ] , [

            ]);

        if(!$validator->fails()){

            $visitors = Visitor::findOrFail(Auth::guard('visitor')->id());

                if(request()->hasFile('image')){
                    $image = $request->file('image');
                    $imageName = time() . 'image' . $image->getClientOriginalExtension();
                    $image->move('storage/images/visitor' , $imageName);
                    $visitors->image = $imageName;
                }

                $visitors->full_name = $request->get('full_name');
                $visitors->phone = $request->get('phone');
                $visitors->email = $request->get('email');
                $visitors->date_of_birth = $request->get('date_of_birth');  
                
                

                $isUpdate = $visitors->save();
                return ['redirect' => route('showProfile')];
                return response()->json(['icon' => 'success' , 'title' => 'Updated Successfully'] , 200);
            }

        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }
    }

    public function showUploadPhoto(){
        $visitors = Auth::user();
        return response()->view('website.profile.uploadPhoto' , compact('visitors'));
    }

    public function uploadPhoto(Request $request){
        $visitors = Visitor::findOrFail(Auth::guard('visitor')->id());
        
        if(request()->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . 'image' . $image->getClientOriginalExtension();
            $image->move('storage/images/visitor' , $imageName);
            $visitors->image = $imageName;
        }

        $isSaved = $visitors->save();

        if($isSaved){
            return response()->json(['icon' => 'success' , 'title' => 'Uploaded Successfully'] , 200);
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => 'Uploaded Failed'] , 400);
        }

        
    }
}
