<?php

namespace App\Http\Controllers;
use App\Historique;
use App\Projet;
use App\Photo;
use App\Photo_etat;
use App\Offre;
use App\Categorie_offre;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\type_projet;
class projetsController extends Controller
{public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }
 public function index()
    {
      $projets= Projet::orderBy('positionne')->get();
        return view('projets.index',compact('projets'));
    }
     public function update(Projet $projet)
    {
        return view('modification.projet',compact('projet'));
    }
     public function show(Projet $projet)
    {
      
        return view('projets.show',compact('projet'));
    }
    public function ajouter()
    {
        return view('creation.projet');
    }
 
     public function nouveau(Request $request)
    { 
       $this->validate($request, [
             'nom'=>'required|unique:projets',
            'description'=>'required',
           'appartements'=>'required',
            'partieC' =>'required',
           'parking'=>'required',
            'localisation'=>'required',
           'type'=>'required',
           'video'=>'mimes:mp4,mov,ogg',
           'pourcentage'=>'nullable|integer|min:0',
    'filename.0' => 'dimensions:width=560,height=460|required',
    'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
    
           
    'filename2.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
           'type_offre' => 'nullable',
       'date_debut' => 'nullable|date|after:'. date('Y-m-d'),
           'date_fin' => 'nullable|date|after:'.request('date_debut')
]);
           $projet=new Projet;
            $Type=request('type');
 $S1= type_projet::where('nom','=',$Type)->pluck('id')->first();
  if($S1==null)
       { 
      $tp=new type_projet;
     $tp->nom= $Type;
      $tp->save(); 
       }
            $projet->nom=request('nom');
         $projet->description=request('description');
       
         $projet->appartements=request('appartements');
        $projet->parking=request('parking');
        if($request->hasfile('video'))
         {
            
         $projet->video=request('nom').'_video.'.$request->file('video')->getClientOriginalExtension();
       }
            $projet->disponibilite=request('disponibilite');
          $projet->partieC=request('partieC');
          $projet->pourcentage=request('pourcentage');
       
         $projet->localisation=request('localisation');
        $projet->type=request('type');
         $projet->save();
         
         
         
         if($request->hasfile('filename'))
         {
            
            foreach($request->file('filename') as $image)
            {
               $file= $image;

            $filename=mt_rand(1,500).str_shuffle(md5(uniqid().time())). '.' . $file->getClientOriginalExtension();
          Storage::disk('local')->put($filename,File::get($file));
        
                
                $photo=new Photo();
                $photo->nom=$filename;
                $photo->type='';
                $photo->projet_id=$projet->id;
                $photo->save();
            }
         } 
         
         
         
          if($request->hasfile('filename2'))
         {
            
            foreach($request->file('filename2') as $image)
            {
               $file= $image;
        $filename=mt_rand(1,500).str_shuffle(md5(uniqid().time())). '.' . $file->getClientOriginalExtension();
          Storage::disk('local')->put($filename,File::get($file));
        
                $photo2=new Photo_etat();
                $photo2->nom=$filename;
                $photo2->type='';
                $photo2->projet_id=$projet->id;
                $photo2->save();
            }
            }
         
         
         if($request->hasfile('video'))
         {
            
         $filename12=request('nom').'_video.'.$request->file('video')->getClientOriginalExtension();
          Storage::disk('local')->put($filename12,File::get($request->file('video')));
              
            }
            

      
       

         if((request('type_offre')!='')&&(request('date_debut')!='')&&(request('date_fin')!=''))
         {
          $typeC=request('type_offre');
 $S= Categorie_offre::where('nom','=',$typeC)->pluck('id')->first();
  if($S==null)
       { 
      $Ct=new Categorie_offre;
     $Ct->nom= $typeC;
      $Ct->save(); 
       }
         $offre= new Offre;
              $offre->type=request('type_offre');
              $offre->date_debut=request('date_debut');
              $offre->date_fin=request('date_fin');
             $offre->projet_id=$projet->id;
             $offre->save();
         }
         
          $information='Nom: '.$projet->nom."<br>";
        $historique = Historique::create([

'actoin' => 'Insertion',
'table' => 'Projet',
'information' => $information,
'user_id' =>$request->user()->id,
'user_name' =>$request->user()->name
    ]);
           session()->flash('message','Projet Créer!'); 
       return redirect()->action('UsersController@projets');  
         
    }
    
     public function delete(Projet $projet,Request $request)
    {
           $information='Nom: '.$projet->nom."<br>";
        $historique = Historique::create([

'actoin' => 'Suppression',
'table' => 'Projet',
'information' => $information,
'user_id' =>$request->user()->id,
'user_name' =>$request->user()->name
    ]);
       $projet->offre()->delete();
         foreach($projet->photos as $photo)
         {
               Storage::disk('local')->delete($photo->nom);
             $photo->delete();
         }
          foreach($projet->photos_etats as $photo2)
         {
               Storage::disk('local')->delete($photo2->nom);
             $photo2->delete();
         }
     Storage::disk('local')->delete($projet->video);
         $projet->delete();
        
           session()->flash('message','Projet  Supprimer!'); 
       return redirect()->action('UsersController@projets');  
    }
   
     public function updateProjet(Projet $projet,Request $request)
    {
         $this->validate($request, [
             'nom'=>'required',
            'description'=>'required',
           'appartements'=>'required',
            'partieC' =>'required',
           'parking'=>'required',
            'localisation'=>'required',
           'type'=>'required',
           'video'=>'mimes:mp4,mov,ogg',
            'pourcentage'=>'nullable|integer|min:0',
    'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
           
    'filename2.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
           'type_offre' => 'nullable',
       'date_debut' => 'nullable|date|after:'. date('Y-m-d'),
           'date_fin' => 'nullable|date|after:'.request('date_debut')
]);
      $information='Nom: '.$projet->nom."<br>";
        $historique = Historique::create([

'actoin' => 'Modification',
'table' => 'Projet',
'information' => $information,
'user_id' =>$request->user()->id,
'user_name' =>$request->user()->name
    ]); 
          $projet->offre()->delete();
           $Type=request('type');
 $S1= type_projet::where('nom','=',$Type)->pluck('id')->first();
  if($S1==null)
       { 
      $tp=new type_projet;
     $tp->nom= $Type;
      $tp->save(); 
       }
       if($request->hasfile('video'))
              {
                  Storage::disk('local')->delete($projet->video);
                  
 $projet->update([
  'video' => request('nom').'_video.'.$request->file('video')->getClientOriginalExtension()
  ]);
    $filename12=request('nom').'_video.'.$request->file('video')->getClientOriginalExtension();
          Storage::disk('local')->put($filename12,File::get($request->file('video')));
 
              }
            $projet->update([
         'nom' => request('nom'),
        'description' => request('description'),
        'appartements' => request('appartements'),
             'partieC' => request('partieC'),
                  'parking' => request('parking'),
                  'disponibilite' => request('disponibilite'),
                  'pourcentage' =>request('pourcentage'),
        'localisation' => request('localisation'),
        'type' => request('type')
                 
]);

         if($request->hasfile('filename'))
         {
            
            foreach($request->file('filename') as $image)
            {
               $file= $image;
         $filename=mt_rand(1,500).str_shuffle(md5(uniqid().time())). '.' . $file->getClientOriginalExtension();
          Storage::disk('local')->put($filename,File::get($file));
                
                $photo=new Photo();
                $photo->nom=$filename;
                $photo->type='';
                $photo->projet_id=$projet->id;
                $photo->save();
            }
         } 
         
         
         
          if($request->hasfile('filename2'))
         {
           
            foreach($request->file('filename2') as $image)
            {
               $file= $image;
         $filename=mt_rand(1,500).str_shuffle(md5(uniqid().time())). '.' . $file->getClientOriginalExtension();
          Storage::disk('local')->put($filename,File::get($file));
                
                $photo2=new Photo_etat();
                $photo2->nom=$filename;
                $photo2->type='';
                $photo2->projet_id=$projet->id;
                $photo2->save();
            }
            }   
 
         if((request('type_offre')!='')&&(request('date_debut')!='')&&(request('date_fin')!=''))
         {
          $typeC=request('type_offre');
 $S= Categorie_offre::where('nom','=',$typeC)->pluck('id')->first();
  if($S==null)
       { 
      $Ct=new Categorie_offre;
     $Ct->nom= $typeC;
      $Ct->save(); 
       }
         $offre= new Offre;
              $offre->type=request('type_offre');
              $offre->date_debut=request('date_debut');
              $offre->date_fin=request('date_fin');
             $offre->projet_id=$projet->id;
             $offre->save();
         }
         session()->flash('message','Projet  Modifier!'); 
       return redirect()->action('UsersController@projets'); 
    }
   
public function deletePhoto1(Photo  $photo,Request $request)
    {
          Storage::disk('local')->delete($photo->nom);
             $photo->delete();
            $information='Nom: '.$photo->projet->nom."<br>";
         $historique = Historique::create([

'actoin' => 'Suppression',
'table' => 'Photo',
'information' => $information,
'user_id' =>$request->user()->id,
'user_name' =>$request->user()->name
    ]); 
               
   return back();
}
public function deletePhoto2(Photo_etat  $photo,Request $request)
    {
          Storage::disk('local')->delete($photo->nom);
             $photo->delete();
            $information='Nom: '.$photo->projet->nom."<br>";
         $historique = Historique::create([

'actoin' => 'Suppression',
'table' => 'Photo_etat',
'information' => $information,
'user_id' =>$request->user()->id,
'user_name' =>$request->user()->name
    ]); 
               
   return back();
}


public function updatepostion(Request $request)
    {
      $positions=$request->get('positions');
     foreach ($positions as $position) {
     $index = $position[0];
      $newPosition = $position[1];
      $projet=Projet::where('id','=',$index)->update(['positionne'=> $newPosition]);
     
     
     }
          

   return response()->json(['message' => $positions],200);       
      

}


}
