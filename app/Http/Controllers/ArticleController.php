<?php

namespace App\Http\Controllers;
use App\Article;
use App\Motcle;
use App\Auteur;
use App\Historique;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ArticleController extends Controller
{
    public function __construct()
    {
      
        $this->middleware('auth')->except(['getimage','getArtilce']);
    }
       public function create()//voir le formulaire de l'ajout d'un article
    {
        
        return view('creation.create_article');
    }
    
   
    
     public function update(Article $article)//voir le formulaire de la modification d'un article
    {
        
        return view('modification.article',compact('article'));
    }
    
    
     public function ajouter(Request $request)//ajouter un article
    {
        $this->validate( request(),[
            'titre'=>'required|min:2',
            'resume'=>'required|min:5|max:500',
           'text'=>'required|min:100',
             'video'=>'mimes:mp4,mov,ogg',
            'photo'=>'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);
          $file= $request->file('photo');
            $filename=mt_rand(1,500).str_shuffle(md5(uniqid().time()));
          Storage::disk('local')->put($filename,File::get($file));
            $article=new Article;
            $article->titre=request('titre');
         $article->resume=request('resume');
       
         $article->text=request('text');
        $article->source=request('source');
        $article->photo=$filename;
         if($request->hasfile('video'))
         {
            
          $filename12=request('titre').'_video.'.$request->file('video')->getClientOriginalExtension();
          Storage::disk('local')->put($filename12,File::get($request->file('video')));
           $article->video=request('titre').'_video.'.$request->file('video')->getClientOriginalExtension();
       }
         $article->save();
         if(request('mot_cles')!='')
      { 
        $mot_cles=request('mot_cles');
   foreach ($mot_cles as $motcle) {
       
       $S= Motcle::where('name','=',$motcle)->pluck('id')->first();
       if($S==null)
       { 
      $mc=new Motcle;
      $mc->name=$motcle; 
      $mc->save();
            $article->motcles()->attach($mc);
       }
       else{
          $mc=motcle::where('name','=',$motcle)->get();
         
            $article->motcles()->attach($mc); 
       } 
        
    }
  }
  if(request('auteurs')!='')
  {
           $auteurs=request('auteurs');
   foreach ($auteurs as $auteur) {
       
       $S= Auteur::where('nom','=',$auteur)->pluck('id')->first();
       if($S==null)
       { 
      $at=new Auteur;
      $at->nom=$auteur; 
      $at->save();
            $article->auteurs()->attach($at);
       }
       else{
          $at=Auteur::where('nom','=',$auteur)->get();
         
            $article->auteurs()->attach($at); 
       } 
        
    }
  }
          $information='Titre: '.$article->titre."<br>";
        $historique = Historique::create([

'actoin' => 'Insertion',
'table' => 'Article',
'information' => $information,
'user_id' =>$request->user()->id,
'user_name' =>$request->user()->name
    ]);
           session()->flash('message','Article Créer!'); 
       return redirect()->action('UsersController@articles');    
}
    
    
    
    
    public function delete(Article $article,Request $request)//voir un article
    {
          
 $information='Titre: '.$article->titre."<br>";
 $historique = Historique::create([
'actoin' => 'Suppression',
'table' => 'Article',
'information' => $information,
'user_id' =>$request->user()->id,
'user_name' =>$request->user()->name
    ]);
 foreach($article->comments as $c)
 {
 $c->delete();
 }
        
         $article->auteurs()->detach();
        
         $article->motcles()->detach();
         
        Storage::disk('local')->delete($article->photo);
         Storage::disk('local')->delete($article->video);
      
     $article->delete();
        
           session()->flash('message','Article  Supprimer!'); 
       return redirect()->action('UsersController@articles');    
}
    
    
       public function modifier(Article $article,Request $request)//voir un article
    {
           
            $this->validate( request(),[
             'titre'=>'required|min:5',
            'resume'=>'required|min:10|max:500',
           'text'=>'required|min:100',
           'video'=>'mimes:mp4,mov,ogg',
            'photo'=>'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
           $article->auteurs()->detach();
        
         $article->motcles()->detach();
          
          $information='Titre: '.$article->titre."<br>";
        $historique = Historique::create([

'actoin' => 'Modification',
'table' => 'Article',
'information' => $information,
'user_id' =>$request->user()->id,
'user_name' =>$request->user()->name
    ]);
        if($request->file('photo')!='')
        {
           Storage::disk('local')->delete($article->photo);
            $file= $request->file('photo');
            $filename=mt_rand(1,500).str_shuffle(md5(uniqid().time()));
          Storage::disk('local')->put($filename,File::get($file));
           $article->update([
         
             'photo' => $filename
                
]); 
        }
        if($request->hasfile('video'))
              {
                  Storage::disk('local')->delete($article->video);
                  
 $article->update([
  'video' => request('titre').'_video.'.$request->file('video')->getClientOriginalExtension()
  ]);
    $filename12=request('titre').'_video.'.$request->file('video')->getClientOriginalExtension();
          Storage::disk('local')->put($filename12,File::get($request->file('video')));
 
              }
         
           
             $article->update([
         'titre' => request('titre'),
        'resume' => request('resume'),
        'text' => request('text'),
             'source' => request('source')
                
]);
           
             if(request('mot_cles')!='')
             {
            $mot_cles=request('mot_cles');
   foreach ($mot_cles as $motcle) {
       
       $S= Motcle::where('name','=',$motcle)->pluck('id')->first();
       if($S==null)
       { 
      $mc=new Motcle;
      $mc->name=$motcle; 
      $mc->save();
            $article->motcles()->attach($mc);
       }
       else{
          $mc=motcle::where('name','=',$motcle)->get();
         
            $article->motcles()->attach($mc); 
       } 
        
    }
  }
  if(request('auteurs')!='')
  {
           $auteurs=request('auteurs');
   foreach ($auteurs as $auteur) {
       
       $S= Auteur::where('nom','=',$auteur)->pluck('id')->first();
       if($S==null)
       { 
      $at=new Auteur;
      $at->nom=$auteur; 
      $at->save();
            $article->auteurs()->attach($at);
       }
       else{
          $at=Auteur::where('nom','=',$auteur)->get();
         
            $article->auteurs()->attach($at); 
       } 
        
    }
  }

     
        
           session()->flash('message','Article Modifier!'); 
     return redirect()->action('UsersController@articles');     
}
    
    
    public function getimage($fileimage)
    {
        $file=Storage::disk('local')->get($fileimage);
        return new Response($file,200);
        
    }
      public function getArtilce(Article $article)
    {
        return view('actualites.show',compact('article'));
        
    }
    
    
}