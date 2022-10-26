<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::with('user')->orderBy('id' , 'asc')->paginate(5);
        $this->authorize('viewAny' , Admin::class);
        return response()->view('cms.admin.index' , compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::orderBy('id','asc')->get();
        $cities = City::all();
        $roles = Role::where('guard_name' , 'admin')->get();
        $this->authorize('create' , Admin::class);
        return response()->view('cms.admin.create' , compact('countries' , 'cities' , 'roles'));
    }

    public function adminCreate($id){
        $countries = Country::all()->with('cities')->where('country_id' , $id);
        // $cities = City::where('country_id' , $id);
        return response()->view('cms.admin.create' , compact('countries' , 'cities' , 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all() , [

            'email'=>"required|string|min:7",
            'mobile'=>"required|string",
            'image'=>"image|max:2048|mimes:png,jpg,jpeg,pdf,webp",

        ] , [

        ]);

        if(!$validator->fails()){

            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));

            $isSaved = $admins->save();

            if($isSaved){
                $users = new User();

                if(request()->hasFile('image')){
                    $image = $request->file('image');
                    $imageName = time() . 'image' . $image->getClientOriginalExtension();
                    $image->move('storage/images/admin' , $imageName);
                    $users->image = $imageName;
                }

                $roles = Role::findOrFail($request->get('role_id'));
                $admins->assignRole($roles->name);

                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get('mobile');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->country_id = $request->get('country_id');
                // بنكتب اسم علاقة المورف , بعدها دالة associate و بندخل الها المتغير الخاص بالكنترولر اليي شغال عليه
                $users->actor()->associate($admins);



                $isSaved = $users->save();
                return response()->json(['icon' => 'success' , 'title' => 'Created Successfully'] , 200);

                return ['redirect' => route('admins.index')];
            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $admins = Admin::findOrFail($id);
        $this->authorize('update' , Admin::class);
        return response()->view('cms.admin.edit' , compact('countries' , 'admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validator = Validator($request->all() , [

            'email'=>"required|string|min:7",
            'mobile'=>"required|string",
            'image'=>"image|max:2048|mimes:jpeg,png,jpg,gif,svg,webp",

            ] , [

            ]);

        if(!$validator->fails()){

            $admins = Admin::findOrFail($id);
            $admins->email = $request->get('email');


            $isUpdate = $admins->save();

            if($isUpdate){
                $users = User::findOrFail($id);

                if(request()->hasFile('image')){
                    $image = $request->file('image');
                    $imageName = time() . 'image' . $image->getClientOriginalExtension();
                    $image->move('storage/images/admin' , $imageName);
                    $users->image = $imageName;
                }

                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get('mobile');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->country_id = $request->get('country_id');
                // بنكتب اسم علاقة المورف , بعدها دالة associate و بندخل الها المتغير الخاص بالكنترولر اللي شغال عليه
                $users->actor()->associate($admins);

                $isUpdate = $users->save();
                return ['redirect' => route('admins.index')];
                return response()->json(['icon' => 'success' , 'title' => 'Updated Successfully'] , 200);



            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        // $admins = Admin::destroy($id);
        // return response()->json(['icon' => 'success' , 'title' => 'Deleted Successfully'] , 200);

        if ($admin->id == Auth::id()){
            return redirect()->route('admins.index')
            ->withErrors(trans('Cannot Delete Yourself'));
        }
        else {
            $admin->user()->delete();
            $isDeleted = $admin->delete();
            return response()->json(['icon' => 'success' , 'title' => 'Admin Deleted Successfully'] , 200);
        }

        $this->authorize('delete' , Admin::class);
    }
}
