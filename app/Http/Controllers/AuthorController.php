<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Country;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        $authors = Author::with('user')->withCount('articles')->orderBy('id' , 'asc')->paginate(5);
        $this->authorize('viewAny' , Author::class);
        return response()->view('cms.author.index' , compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $roles = Role::where('guard_name' , 'author')->get();
        $this->authorize('create' , Author::class);
        return response()->view('cms.author.create' , compact('countries' , 'roles'));
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
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'mobile' => 'required|min:7',
        ], [

        ]);

        if(!$validator->fails()){
            $authors = new Author();
            $authors->email = $request->get('email');
            $authors->password = Hash::make($request->get('password'));

            if(request()->hasFile('file')){
                $file = $request->file('file');
                $fileName = time() . 'file' . $file->getClientOriginalExtension();
                $file->move('storage/files/author' , $fileName);
                $authors->file = $fileName;
            }

            $isSaved = $authors->save();

            if($isSaved){
                $users = new User();

                if(request()->hasFile('image')){
                    $image = $request->file('image');
                    $imageName = time() . 'image' . $image->getClientOriginalExtension();
                    $image->move('storage/images/author' , $imageName);
                    $users->image = $imageName;
                }

                $roles = Role::findOrFail($request->get('role_id'));
                $authors->assignRole($roles->name);

                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get('mobile');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->country_id = $request->get('country_id');
                $users->actor()->associate($authors);

                $isSaved = $users->save();
                return response()->json(['icon' => 'success' , 'title' => 'Created Successfully'] , 200);
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
        $authors = Author::findOrFail($id);
        $this->authorize('update' , Author::class);
        return response()->view('cms.author.edit' , compact('countries' , 'authors'));
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
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            // 'mobile' => 'required|number|min:7',
        ], [

        ]);

        if(!$validator->fails()){
            $authors = Author::findOrFail($id);
            $authors->email = $request->get('email');

            if(request()->hasFile('file')){
                $file = $request->file('file');
                $fileName = time() . 'file' . $file->getClientOriginalExtension();
                $file->move('storage/files/author' , $fileName);
                $authors->file = $fileName;
            }

            $isUpdate = $authors->save();

            if($isUpdate){
                $users = User::findOrFail($id);

                if(request()->hasFile('image')){
                    $image = $request->file('image');
                    $imageName = time() . 'image' . $image->getClientOriginalExtension();
                    $image->move('storage/images/author' , $imageName);
                    $users->image = $imageName;
                }

                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->mobile = $request->get('mobile');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->date_of_birth = $request->get('date_of_birth');
                $users->country_id = $request->get('country_id');
                $users->actor()->associate($authors);

                $isUpdate = $users->save();
                return ['redirect' => route('authors.index')];
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
    public function destroy($id)
    {
        $authors = Author::destroy($id);
        $this->authorize('delete' , Author::class);
        return response()->json(['icon' => 'success' , 'title' => 'Deleted Successfully'] , 200);
    }
}
