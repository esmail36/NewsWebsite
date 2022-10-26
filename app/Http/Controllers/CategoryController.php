<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Dotenv\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id' , 'asc')->paginate(4);
        $this->authorize('viewAny' , Category::class);
        return response()->view('cms.category.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create' , Category::class);
        return response()->view('cms.category.create');
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
            'name' => 'required|min:3|string',

        ] , [

        ]);

        if(! $validator->fails()){

            $categories = new Category();
            $categories->name = $request->get('name');
            $categories->description = $request->get('description');

            $isSaved = $categories->save();

            return response()->json(['icon' => 'success' , 'title' => 'Created Successfully'] , 200);
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 200);
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
        $categories = Category::findOrFail($id);
        $this->authorize('update' , Category::class);
        return response()->view('cms.category.edit' , compact('categories'));
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
            'name' => 'required|min:3|string',

        ] , [

        ]);

        if(! $validator->fails()){

            $categories = Category::findOrFail($id);
            $categories->name = $request->get('name');
            $categories->description = $request->get('description');

            $isSaved = $categories->save();

            return['redirect' => route('categories.index')];
            return response()->json(['icon' => 'success' , 'title' => 'Updated Successfully'] , 200);
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 200);
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
        $categories = Category::destroy($id);
        $this->authorize('delete' , Category::class);
        return response()->json(['icon' => 'success' , 'title' => 'Deleted Successfyll'] , 200);
    }
}
