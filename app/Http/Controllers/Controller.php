<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Article;
use App\Projet;
use App\Standard;
use App\Motcle;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    public function about()
    {
        
        return view('presentation.about');
    }
    
    public function standards()
    {
        
        $standards=Standard::where('id','=','1')->first();
        return view('presentation.standards',compact('standards'));
    }
    
     
    
     public function fondateur()
    {
        
        return view('presentation.fondateur');
    }
    
    
      public function nosProjets()
    {
        $projets= Projet::orderBy('positionne')->get();
        return view('projets.nos-projets',compact('projets'));
    }
    
     public function nouveauProjets()
    {
         $projets= Projet::orderBy('positionne')->where('type','=','Nouveau')->get();  
        return view('projets.nouveau-projets',compact('projets'));
    }
    
     public function carriere()
    {
        
        return view('carrieres.carriere');
    }
    public function contact()
    {
        
        return view('contacts.contact');
    }
    
     public function actualiteIndex()
    {
           $articles=Article::orderBy('created_at', 'desc')->get();
        
        return view('actualites.index',compact('articles'));
    }
    
    

}