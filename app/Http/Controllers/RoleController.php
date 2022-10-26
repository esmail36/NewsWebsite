<?php

namespace App\Http\Controllers;

use Countable;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $roles = Role::orderBy('id' , 'asc')->withCount('permissions')->paginate(5);
        $this->authorize('viewAny' , Role::class);
        return response()->view('cms.spatie.roles.index' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create' , Role::class);
        return response()->view('cms.spatie.roles.create');
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
            'name' => 'required|string',
            'guard_name' => 'required|string',
        ] , [

        ]);

        if(! $validator->fails()){
            $roles = new Role();
            $roles->name = $request->get('name');
            $roles->guard_name = $request->get('guard_name');

            $isSaved = $roles->save();

            if($isSaved){
                
                return response()->json(['icon' => 'success' , 'title' => 'Created Successfully'] , 200);
                return ['redirect' => route('roles.index')];
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'Created Failed'] , 400);
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
        $roles = Role::findOrFail($id);
        $this->authorize('update' , Role::class);
        return response()->view('cms.spatie.roles.edit' , compact('roles'));
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
            'name' => 'required|string',
            'guard_name' => 'required|string',
        ] , [

        ]);

        if(! $validator->fails()){
            $roles = Role::findOrFail($id);
            $roles->name = $request->get('name');
            $roles->guard_name = $request->get('guard_name');

            $isUpdate = $roles->save();

            if($isUpdate){
                return ['redirect' => route('roles.index')];
                return response()->json(['icon' => 'success' , 'title' => 'Updated Successfully'] , 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'Created Failed'] , 400);
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
        $roles = Role::destroy($id);
        $this->authorize('delete' , Role::class);
        return response()->json(['icon' => 'success' , 'title' => 'Deleted Successfully'] , 200);
    }
}
