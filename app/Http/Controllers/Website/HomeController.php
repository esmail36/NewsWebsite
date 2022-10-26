<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Slider;
use App\Models\Visitor;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    public function home(){
        $sliders = Slider::all();
        $categories = Category::all();
        $articles = Article::take(3)->orderBy('id','desc')->get();
        return response()->view('website.index' , compact('sliders' , 'categories' , 'articles'));
    }

    public function contact(){
        return response()->view('website.contact');
    }

    public function createContact(Request $request){
        $validator = Validator($request->all() , [
            'full_name' => 'required|string',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:10'
        ] , [

        ]);

        if(! $validator->fails()){

            $contacts = new Contact();
            $contacts->full_name = $request->get('full_name');
            $contacts->phone = $request->get('phone');
            $contacts->email = $request->get('email');
            $contacts->message = $request->get('message');

            $isSaved = $contacts->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'Send Successfully'] , 200);
            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }
    }

    public function newsDetailes($id){
        $articles = Article::with('comments')->findOrFail($id);
        $comments = Comment::where('article_id' , $id)->orderBy('created_at' , 'desc')->get();
        $allArticles = Article::where('id' , '!=' , $id)
        ->where('category_id' , $articles->category_id)
        ->take(3)
        ->inRandomOrder()
        ->get(); 
        // $comments = Comment::where('article_id' , $id)->get();
        return response()->view('website.newsdetailes' , compact('articles' , 'id' , 'allArticles' , 'comments'));
        
    }

    public function allNews($id){
        $categories = Category::findOrFail($id);
        $articles = Article::where('category_id' , $id)->orderBy('created_at' , 'asc')->paginate(4);
        return response()->view('website.all-news' , compact('articles' , 'id' , 'categories'));
    }
}
