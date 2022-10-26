<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Dotenv\Validator;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    // public function __construct()
// {
    // Middleware only applied to these methods
    // $this->middleware(['auth:visitor'])->only([
        // 'comment' // Could add bunch of more methods too
    // ]);
// }

    public function comment(Request $request){
        $validator = Validator($request->all() , [

        ],[

        ]);

        if(! $validator->fails()){
            $comments = new Comment();
            $comments->comment = $request->get('comment');
            $comments->article_id = $request->get('article_id');
            $comments->visitor_id = $request->get('visitor_id');
            // $comments->message = $request->get('message');

            $isSaved = $comments->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'Commented Successfully'] , 200);
            }

        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
        }
    }
}
