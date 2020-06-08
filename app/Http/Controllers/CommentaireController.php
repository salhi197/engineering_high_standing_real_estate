<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\Commentaire;
use Carbon\Carbon;
class CommentaireController extends Controller
{
	public function store(Article $article, Request $request)
{
         $this->validate( request(),[
            
            'commentaire'=>'min:5|max:500|required',
            'email'=>'required|max:255|email',
             'nom'=>'required|max:255'
            
        ]);
  
     $commentData = array_merge($request->all());

        $comment = Commentaire::make($commentData);

        $article->comments()->save($comment);


    return back();
}
   
}
