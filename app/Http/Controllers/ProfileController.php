<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{
    
    public function showProfile(){
        if (Auth::guard('admin')->id()) {
            $admins = Admin::with('user' , 'roles')->get();
            // $roles = Role::where('guard_name' , 'admin');
            return response()->view('cms.profile.profile' , compact('admins'));
        } 
        else {
            $authors = Author::with('user' , 'roles')->get();
            // $roles = Role::where('guard_name' , 'author');
            return response()->view('cms.profile.profile' , compact('authors'));
        }
        
        
    }
}
