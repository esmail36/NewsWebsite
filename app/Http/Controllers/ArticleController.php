<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      // الدوال الجديدة

    public function indexArticle($id){
        $articles = Article::where('author_id' , '=' , $id)->orderBy('id' , 'asc')->paginate(4);
        $this->authorize('viewAny' , Article::class);
        return response()->view('cms.article.index' , compact('articles' , 'id'));
    }

    public function createArticle($id){

        $categories = Category::all();
        $this->authorize('create' , Article::class);
        return response()->view('cms.article.create' , compact('categories' , 'id'));
    }

    // public function editArticle($id){

        
    // }

    // ///////////////////////////////////


    public function index()
    {
        $articles = Article::with('author' , 'category')->orderBy('id' , 'desc')->paginate(4);
        $this->authorize('viewAny' , Article::class);
        return response()->view('cms.article.index-all' , compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        $this->authorize('create' , Article::class);
        return response()->view('cms.article.create' , compact('categories' , 'authors'));
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
            'title' => 'required|min:3',
        ] , [

        ]);

        if(! $validator->fails()){
            $articles = new Article();

            if(request()->hasFile('image')){
                $image = $request->file('image');
                $imageName = time() . 'image' . $image->getClientOriginalExtension();
                $image->move('storage/images/article' , $imageName);
                $articles->image = $imageName;
            }

            $articles->title = $request->get('title');
            $articles->short_description = $request->get('short_description');
            $articles->full_description = $request->get('full_description');
            $articles->category_id = $request->get('category_id');
            $articles->author_id = $request->get('author_id');

            $isaSaved = $articles->save();
            return response()->json(['icon' => 'success' , 'title' => 'Created Successfully'] , 200);
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
        $articles = Article::findOrFail($id);
        $categories = Category::all();
        $authors = Author::where('id' , 'author_id');
        $this->authorize('update' , Article::class);
        
        return response()->view('cms.article.edit' , compact('categories' , 'articles' , 'authors'));
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
            'title' => 'required|min:3',
        ] , [

        ]);

        if(! $validator->fails()){
            $articles = Article::findOrFail($id);

            if(request()->hasFile('image')){
                $image = $request->file('image');
                $imageName = time() . 'image' . $image->getClientOriginalExtension();
                $image->move('storage/images/article' , $imageName);
                $articles->image = $imageName;
            }
            
            $articles->title = $request->get('title');
            $articles->short_description = $request->get('short_description');
            $articles->full_description = $request->get('full_description');
            $articles->category_id = $request->get('category_id');
            $articles->author_id = $request->get('author_id');

            $isaUpdated = $articles->save();
            
            if($isaUpdated){
                
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
        $articles = Article::destroy($id);
        $this->authorize('delete' , Article::class);
        return response()->json(['icon' => 'success' , 'title' => 'Deleted Successfully'] , 200);
    }
}
