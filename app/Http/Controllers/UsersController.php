<?php

namespace App\Http\Controllers;
use Jenssegers\Date\Date;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use App\Historique;
use App\Contact;
use App\Message;
use App\Telephone;
use App\adresse;
use App\Fax;
use App\Reseau;
use App\email;
use App\Article;
use App\Projet;
use App\Standard;
use App\Offre;
use App\Categorie_offre;
use App\Slider;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index(Request $request)
    {
           $user=$request->user();
     $historiques=Historique::where('user_id','=',$user->id)->get();

           return view('dashboard.index',compact('historiques'));
          
     
    }
     public function sliderprojet()
    {
           
     $SlidersP=Slider::where('type','=','projet')->get();

           return view('dashboard.sliderProjet',compact('SlidersP'));
          
     
    }
     public function createP()
    {
           $type='projet';

           return view('creation.slider',compact('type'));
          
     
    }
    public function createA()
    {
           $type='article';

           return view('creation.slider',compact('type'));
          
     
    }
     public function createSlider(Request $request)
    {
           $this->validate( request(),[
            'titre'=>'required',
             'text'=>'required',
             'image'=>'image|required|mimes:jpeg,png,jpg,gif,svg|dimensions:width=1920,height=771'
            
        ]);
            $file= $request->file('image');
            $filename=mt_rand(1,500).str_shuffle(md5(uniqid().time())). '.' . $file->getClientOriginalExtension();
          Storage::disk('local')->put($filename,File::get($file));
         
                $silder=new Slider();
                $silder->titre=request('titre');
                $silder->text=request('text');
                $silder->type=request('type');
                 $silder->image= $filename;
                  $silder->projet_id=request('projet_id');
                  $silder->article_id=request('article_id');
                $silder->save();
           $information='Slider : '.request('titre')."<br>";
    $historique = Historique::create([

'actoin' => 'Insertion',
'table' => 'Slider',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]); 

    session()->flash('message','Slider Créer!'); 
    if(request('type')=='projet')
{
  return redirect()->action('UsersController@sliderprojet');  
}
else
{
   return redirect()->action('UsersController@sliderarticle');
}
}
     
    
     public function suppSlider(Slider $slider,Request $request)
    {
           $type=$slider->type;
       $information='Slider: '.$slider->titre. "<br>";
    $historique = Historique::create([

'actoin' => 'Supprission',
'table' => 'Slider',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]);
     Storage::disk('local')->delete($slider->image);
       $slider->delete(); 

       session()->flash('message','Slider Supprimer!'); 
    if($type=='projet')
{
  return redirect()->action('UsersController@sliderprojet');  
}
else
{
   return redirect()->action('UsersController@sliderarticle');
}   
          
     
    }
     public function sliderarticle()
    {
           
     $SlidersA=Slider::where('type','=','article')->get();

           return view('dashboard.sliderArticle',compact('SlidersA'));
          
     
    }
    public function updateSlider(Slider $slider)
    {
           
    

           return view('modification.slider',compact('slider'));
          
     
    }
      public function updateSlider2(Slider $slider,Request $request)
    {
           
     $this->validate( request(),[
            'titre'=>'required',
             'text'=>'required',
             'image'=>'image|mimes:jpeg,png,jpg,gif,svg|dimensions:width=1920,height=771'
            
        ]);
   
     $type=request('type');
     
           $information='Titre: '.$slider->titre."<br>";
        $historique = Historique::create([

'actoin' => 'Modification',
'table' => 'Slider',
'information' => $information,
'user_id' =>$request->user()->id,
'user_name' =>$request->user()->name
    ]);
         $slider->update([
         'titre' => request('titre'),
        'text' => request('text'),
             'type' => request('type')


            
]);
         
         
          if($request->file('image')!='')
        {
           Storage::disk('local')->delete($slider->image);
            $file= $request->file('image');
            $filename=mt_rand(1,500).str_shuffle(md5(uniqid().time())). '.' . $file->getClientOriginalExtension();
          Storage::disk('local')->put($filename,File::get($file));
           $slider->update([
         
             'image' => $filename
                
]); 
        } 
       
         session()->flash('message','Slider Modifier!'); 
    if(request('type')=='projet')
{
  return redirect()->action('UsersController@sliderprojet');  
}
else
{
   return redirect()->action('UsersController@sliderarticle');
}

    }
    
     public function projets()
    {
          $projets=Projet::orderBy('positionne')->get();
           return view('dashboard.projets',compact('projets'));   
     
    }
    public function emails()
    {
 $Contacts=Contact::where('id','=','1')->first();
            return view('dashboard.emails',compact('Contacts'));   
     
    }
    public function ajoutemail()
    {

          return view('creation.email');  
     
    }
     public function ajoutemail2(Request $request)
    {

          $this->validate( request(),[
            'email'=>'required|unique:emails|email'
             
            
        ]);
       $Contacts=Contact::where('id','=','1')->first();
       $email= new email();
           $email->email=request('email');
          
           $email->contact_id=$Contacts->id;
         $email->save();
      $information='Email : '.request('email')."<br>";
    $historique = Historique::create([

'actoin' => 'Insertion',
'table' => 'Email',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]); 

    session()->flash('message','Email Créer!'); 
  return redirect()->action('UsersController@emails');   
     
    }

    public function deletemail(Request $request,email $email)
    {
 
     $information='Email: '.$email->email. "<br>";
    $historique = Historique::create([

'actoin' => 'Supprission',
'table' => 'Email',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]);
       $email->delete(); 

       session()->flash('message','Email  Supprimer!'); 
    return redirect()->action('UsersController@emails');   
     
    }
public function updateEmail(email $email)
    {
       
   return view('modification.email',compact('email'));           
     
    }
    public function updateEmail2(email $email,Request $request)
    {
      $this->validate( request(),[
            'email'=>'required|unique:emails|email'
             
            
        ]);

      $information='Email : '.request('email'). "<br>";
    $historique = Historique::create([

'actoin' => 'Modification',
'table' => 'Email',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]);

      $email->update([
         'email' =>request('email')
       ]);
 session()->flash('message','Email  Modifier!'); 	   
     return redirect()->action('UsersController@emails'); 
    }


    public function Reseaux()
    {
 $Contacts=Contact::where('id','=','1')->first();
            return view('dashboard.reseau',compact('Contacts'));   
     
    }
     public function NewReseaux()
    {
 $Contacts=Contact::where('id','=','1')->first();
            return view('creation.reseau',compact('Contacts'));   
     
    }
    public function updateReseau(Reseau $reseau)
    {


            return view('modification.reseau',compact('reseau'));   
     
    }

    public function updateReseau2(Request $request,Reseau $reseau)
    {
      $this->validate( request(),[
            'type'=>'required',
             'url'=>'required'
            
        ]);
      $information='Type : '.request('type'). "<br>";
    $historique = Historique::create([

'actoin' => 'Modification',
'table' => 'Réseau',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]);
     $reseau->update([
         'type' =>request('type'),
         'url'=>request('url')
]);
             session()->flash('message','Réseau Modifier!');
return redirect()->action('UsersController@Reseaux');
    }
    public function NewReseaux2(Request $request)
    {
      $this->validate( request(),[
            'type'=>'required|unique:reseaus',
             'url'=>'required|unique:reseaus'
            
        ]);
       $Contacts=Contact::where('id','=','1')->first();
       $reseau= new Reseau();
           $reseau->type=request('type');
           $reseau->url=request('url');
           $reseau->contact_id=$Contacts->id;
         $reseau->save();
      $information='Type : '.request('type'). "<br>";
    $historique = Historique::create([

'actoin' => 'Insertion',
'table' => 'Réseau',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]); 
    session()->flash('message','Réseau Créer!');
    
  return redirect()->action('UsersController@Reseaux');  
             
     
    }
    public function deleteReseau(Request $request,Reseau $reseau)
    {
    $information='Type : '.$reseau->type. "<br>";
    $historique = Historique::create([

'actoin' => 'Supprission',
'table' => 'Réseau',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]);
       $reseau->delete();   
             session()->flash('message','Réseau Supprimer!');
         return redirect()->action('UsersController@Reseaux');
     
    }
     public function offreExceptionnelles()
    {
          $projets=Projet::where('type','=','Nouveau')->get();
           return view('dashboard.projets',compact('projets'));   
     
    }
     public function articles()
    {
          $articles=Article::all();
           return view('dashboard.articles',compact('articles'));   
     
    }
     public function NoStandards()
    {
          $standards=Standard::all();
           return view('dashboard.standards',compact('standards'));   
     
    }
      public function users()
    {
          $users=User::all();
           return view('dashboard.users',compact('users'));   
     
    }
    
       public function historique()
    {
          $historiques=Historique::all();
           return view('dashboard.historique',compact('historiques'));   
     
    }
     public function telephones()
    {
          $Contacts=Contact::where('id','=','1')->first();
      
           return view('dashboard.telephone',compact('Contacts'));   
     
    }
    public function ajoutelephone()
    {
        return view('creation.telephone');    
     
    }
      public function ajout2elephone(Request $request)
    {
          $this->validate( request(),[
            'telephone'=>'required|min:8|max:9|numeric',
             'telephone'=>'unique:telephones'
            
        ]);
           $Contacts=Contact::where('id','=','1')->first();
    $information='Numéro: +213'.request('telephone'). "<br>";
    $historique = Historique::create([

'actoin' => 'Insertion',
'table' => 'Telephone',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]); 
          $telephone= new Telephone();
           $telephone->telephone=request('telephone');
           $telephone->contact_id=$Contacts->id;
         $telephone->save();
		 
       session()->flash('message','Telephone Créer!');
        
  return redirect()->action('UsersController@telephones');     
   
    }
     public function deleteTelephone(Telephone $telephone,Request $request)
    {
         $information='Numéro: +213'.$telephone->telephone. "<br>";
    $historique = Historique::create([

'actoin' => 'Supprission',
'table' => 'Telephone',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]);
       $telephone->delete();   
             session()->flash('message','Telephone Supprimer!');
        
  return redirect()->action('UsersController@telephones'); 
     
    }
    public function newsletter()
    {
          $messages=Message::where('type','=','newsletter')->get();
           return view('dashboard.newsletter',compact('messages'));   
     
    }
    
     public function updateTelephone2(Request $request,Telephone $telephone)
    {
        $this->validate( request(),[
            'telephone'=>'required|min:8|max:9|phone',
             'telephone'=>'unique:telephones'
            
        ]);
       $information='Numéro: +213'.request('telephone'). "<br>";
    $historique = Historique::create([

'actoin' => 'Modification',
'table' => 'Telephone',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]);
        
         
         $telephone->update([
         'telephone' =>request('telephone')
]);
             session()->flash('message','Telephone Modifier!');
        
  return redirect()->action('UsersController@telephones');    
     
    }
    public function updateTelephone(Telephone $telephone)
    {
        
           return view('modification.telephone',compact('telephone'));   
     
    }
    public function getUser(User $user)
    {
      $yes=false;

           return view('modification.user',compact('user','yes'));   
     
    }
    public function getUser2(User $user)
    {
      $yes=true;

           return view('modification.user',compact('user','yes'));   
     
    }
     public function update(User $user,Request $request)
{
          $this->validate( request(),[
            'name'=>'required|max:255',
            'email'=>'required|max:255|email',
            'password'=>'required|confirmed|min:8',
             
            
        ]);
if($request->user()->type=='Administrateur Site'){
           $user->update([
         'name' => request('name'),
        'email' => request('email'),
        'password' => \Hash::make(request('password')),
        'type' => request('type')
]);
         } else
         {
   $user->update([
         'name' => request('name'),
        'email' => request('email'),
        'password' => \Hash::make(request('password'))
]);
         }
   $information='Nom: '.$user->name. "<br>".'Email: '.$user->email. "<br>".'Type: '.$user->type;
        $historique = Historique::create([

'actoin' => 'Modification',
'table' => 'Utilisateur',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]);
         
         
        session()->flash('message','Utlisateur Modifier!');
        
  return redirect()->action('UsersController@users');     
   
         
    
}
  public function bloquer(User $user,Request $request)
{
         
           $user->update([
        
             'droits' => 'bloquer'
]);
   $information='Nom: '.$user->name. "<br>".'Email: '.$user->email. "<br>".'Type: '.$user->type;
        $historique = Historique::create([

'actoin' => 'Bolacage',
'table' => 'Utilisateur',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]);
         
         
        session()->flash('message','Utlisateur bloquer!');
        
  return redirect()->action('UsersController@users');     
   
         
    
}
public function debloquer(User $user,Request $request)
{
         
           $user->update([
        
             'droits' => ''
]);
   $information='Nom: '.$user->name. "<br>".'Email: '.$user->email. "<br>".'Type: '.$user->type;
        $historique = Historique::create([

'actoin' => 'Débolacage',
'table' => 'Utilisateur',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]);
         
         
        session()->flash('message','Utlisateur Déboquer!');
        
  return redirect()->action('UsersController@users');     
   
         
    
}
    
    
     public function delete(User $user,Request $request)
{
   $information='Nom: '.$user->name. "<br>".' Email: '.$user->email. "<br>".'Type: '.$user->type;
        $historique = Historique::create([

'actoin' => 'Supprission',
'table' => 'Utilisateur',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name    
    ]);
          $user->delete();
         
        session()->flash('message','Utlisateur Supprimer!');
        
  return redirect()->action('UsersController@users');     
   
         
    
}
    
  public function adresses()
  {
    $Contacts=Contact::where('id','=','1')->first();
      
           return view('dashboard.adresses',compact('Contacts'));     
  }
      public function ajouteadresses()
    {
         return view('creation.adresse');
    }
     public function ajouteadresses2(Request $request)
    {
         $this->validate( request(),[
            'adresse'=>'required|max:500|unique:adresses'
             
            
        ]); 
      $Contacts=Contact::where('id','=','1')->first();
    $information='Adresse: '.request('adresse');
    $historique = Historique::create([

'actoin' => 'Insertion',
'table' => 'Adresse',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]); 
          $adresse= new adresse();
           $adresse->adresse=request('adresse');
           $adresse->contact_id=$Contacts->id;
         $adresse->save();
       session()->flash('message','Adresse Créer!');
        
  return redirect()->action('UsersController@adresses');     
   
    }
    public function deleteAdresse(adresse $adresse,Request $request)
    {
        
      
    $information='Adresse: '.$adresse->adresse. "<br>";
    $historique = Historique::create([

'actoin' => 'Supprission',
'table' => 'Adresse',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]); 
          
         $adresse->delete();
       session()->flash('message','Adresse Supprimer!');
        
  return redirect()->action('UsersController@adresses');     
   
    }
    public function updateAdresse(adresse $adresse)
    {
        
       return view('modification.adresse',compact('adresse'));   
     
   
    }
      public function updateAdresse2(adresse $adresse,Request $request)
    {
        
        $this->validate( request(),[
            'adresse'=>'required|max:500|unique:adresses'
             
            
        ]);   
  
    $information='Adresse: '.request('adresse'). "<br>";
    $historique = Historique::create([

'actoin' => 'Modification',
'table' => 'Adresse',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]); 
        $adresse->update([
         'adresse' => request('adresse')
       
]);
       session()->flash('message','Adresse Modifier!');
        
  return redirect()->action('UsersController@adresses');  
   
    }
    
     public function faxs()
    {
        $Contacts=Contact::where('id','=','1')->first();
      
           return view('dashboard.faxs',compact('Contacts'));   
        
   
    }
     public function ajoutefax()
    {
        
           return view('creation.fax');   
        
   
    }
    
     public function ajoutefax2(Request $request)
    {
        
          $this->validate( request(),[
            'fax'=>'required|min:8|max:9|numeric',
             'fax'=>'unique:faxes'
            
        ]);   
         $Contacts=Contact::where('id','=','1')->first();
    $information='Fax: '.request('fax'). "<br>";
    $historique = Historique::create([

'actoin' => 'Insertion',
'table' => 'Fax',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]); 
         
          $fax= new Fax();
           $fax->fax=request('fax');
           $fax->contact_id=$Contacts->id;
         $fax->save();
       session()->flash('message','Fax Créer!');
        
  return redirect()->action('UsersController@faxs');   
   
    }
      public function deletefax(Request $request,Fax $fax)
    {
        $information='Fax: +213'.$fax->fax."<br>";
    $historique = Historique::create([

'actoin' => 'Supprission',
'table' => 'Fax',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]);
   $fax->delete();
    session()->flash('message','Fax Supprimer!');
        
  return redirect()->action('UsersController@faxs');   
   
    }


     public function updatefax(Fax  $fax)
    {
        
     return view('modification.fax',compact('fax'));   
    }


     public function updatefax2(Fax  $fax,Request $request)
    {
         $this->validate( request(),[
            'fax'=>'required|max:8|numeric',
             'fax'=>'unique:faxes'
            
        ]);   
          $information='Fax: +213'.request('fax')."<br>";
    $fax->update([
         'fax' => request('fax')
       
]);
    $historique = Historique::create([

'actoin' => 'Modification',
'table' => 'Fax',
'information' => $information,
'user_id' =>$request->user()->id,
   'user_name' =>$request->user()->name     
    ]); 
   
      session()->flash('message','Fax Modifier!');
        
  return redirect()->action('UsersController@faxs');    
    }
     public function information(Historique  $historique)
    {
         return view('information.historique',compact('historique'));   
    }
	
	
	public function NouveauOffre(Projet  $projet)
    {
         return view('creation.offre',compact('projet'));   
    }
	
	
	public function NouveauOffre2(Request $request)
    { 
	$this->validate($request, [
           'type_offre' => 'required',      
		   'date_debut' => 'required|date|after:'. date('Y-m-d'), 
		   'date_fin' => 'required|date|after:'.request('date_debut')
]);
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
             $offre->projet_id=request('projet_id');
             $offre->save();
			  $information='Nom: '.request('nom')."<br>"."Offre:".request('type_offre');
        $historique = Historique::create([

'actoin' => 'Insertion',
'table' => 'Offre',
'information' => $information,
'user_id' =>$request->user()->id,
'user_name' =>$request->user()->name
    ]);
          session()->flash('message','Offre Créer!'); 
		 return redirect()->action('UsersController@projets');   
    }
    
   public function updateOffre(Projet  $projet)
    {
		$offre=$projet->offre;
         return view('modification.offre',compact('offre','projet'));   
    } 
	 public function updateOffre2(Offre  $offre,Request $request)
    {
		$this->validate($request, [
           'type_offre' => 'required',      
		   'date_debut' => 'required|date|after:'. date('Y-m-d'),    
		   'date_fin' => 'required|date|after:'.request('date_debut')
]);
        $typeC=request('type_offre');
 $S= Categorie_offre::where('nom','=',$typeC)->pluck('id')->first();
  if($S==null)
       { 
      $Ct=new Categorie_offre;
     $Ct->nom= $typeC;
      $Ct->save(); 
       }       
    $offre->update([
         'type' => request('type_offre'),
		 'date_debut' => request('date_debut'),
		 'date_fin' => request('date_fin')
       
]);
			   
			  $information='Nom: '.request('projet')."<br>"."Offre:".request('type_offre');
        $historique = Historique::create([

'actoin' => 'Modification',
'table' => 'Offre',
'information' => $information,
'user_id' =>$request->user()->id,
'user_name' =>$request->user()->name
    ]);
          session()->flash('message','Offre  Modifier!'); 
		 return redirect()->action('UsersController@projets');   
    } 

public function deleteOffre(Projet  $projet,Request $request)
    {
   
               
   
         
        $information='Nom: '.$projet->nom."<br>"."Offre:".request('type_offre');
        $historique = Historique::create([

'actoin' => 'Supprission',
'table' => 'Offre',
'information' => $information,
'user_id' =>$request->user()->id,
'user_name' =>$request->user()->name
    ]);
      $offre=  $projet->offre();
      $offre->delete();
      session()->flash('message','Offre  Supprimer!'); 
     return redirect()->action('UsersController@projets');   
    } 

}
