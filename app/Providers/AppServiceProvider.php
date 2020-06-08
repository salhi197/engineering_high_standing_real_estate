<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Contact;
use App\carriere;
use App\Standard;
use App\Historique;
use Carbon\Carbon;
use App\Message;
use App\Auteur;
use App\Motcle;
use App\Projet;
use App\Article;
use App\User;
use App\Categorie_offre;
use App\type_projet;
use App\Slider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
View::composer('actualites.show', function($view){
   
   $articles=Article::orderBy('created_at', 'desc')->take(10)->get();
  
    $view->with(compact('articles'));
   
});
View::composer('contacts.contact', function($view){
   
   $Contacts=Contact::where('id','=','1')->first();
  
    $view->with(compact('Contacts'));
   
});
View::composer('projets.index', function($view){
   
   $Sliders=Slider::orderBy('created_at', 'desc')->where('type','=','projet')->take(3)->get();
  
    $view->with(compact('Sliders'));
   
});


View::composer('actualites.index', function($view){
   
  $Sliders=Slider::orderBy('created_at', 'desc')->where('type','=','article')->take(3)->get();
  
    $view->with(compact('Sliders'));
   
   
});
View::composer('dashboard.standards', function($view){
   
   $Standards=Standard::first();
  
    $view->with(compact('Standards'));
   
});
View::composer('dashboard.index', function($view){
   
   $nb_projets=Projet::count();
  $nb_article=Article::count();
  $nb_user=User::count();
    $view->with(compact('nb_projets','nb_article','nb_user'));
   
});
        
View::composer('layouts.footer', function($view){
   
   $Contacts=Contact::where('id','=','1')->first();
   
    $view->with(compact('Contacts'));
   
});



View::composer('layouts2.nav', function($view){
   
$HistoriquesI=Historique::where('created_at', '>=', date('Y-m-d').' 00:00:00')->where('actoin','=','Ajout')->get();
$HistoriquesS=Historique::where('created_at', '>=', date('Y-m-d').' 00:00:00')->where('actoin','=','Suppression')->get();
$HistoriquesM=Historique::where('created_at', '>=', date('Y-m-d').' 00:00:00')->where('actoin','=','Modification')->get();
$newsletter=Message::where('created_at', '>=', date('Y-m-d').' 00:00:00')->where('type','=','newslatter')->get();

   
    $view->with(compact('HistoriquesI','HistoriquesS','HistoriquesM','newsletter'));
   
});



 View::composer('carrieres.carriere', function($view){
   
   $Carrieres=carriere::all();
   
    $view->with(compact('Carrieres'));
   
});


View::composer('creation.create_article', function($view){
   
   $auteurs=Auteur::all();
   $motcles=Motcle::all();
    $view->with(compact('auteurs','motcles'));
   
});
View::composer('creation.slider', function($view){
   
   $projets=Projet::all();
   $articles=Article::all();
    $view->with(compact('projets','articles'));
   
});
 View::composer('modification.slider', function($view){
   
   $projets=Projet::all();
   $articles=Article::all();
    $view->with(compact('projets','articles'));
   
});

 View::composer('modification.article', function($view){
   
   $auteurs=Auteur::all();
   $motcles=Motcle::all();
    $view->with(compact('auteurs','motcles'));
   
});
 View::composer('creation.projet', function($view){
   
   $offres=Categorie_offre::all();
   $types=type_projet::all();
    $view->with(compact('offres','types'));
   
});
 View::composer('modification.projet', function($view){
   
   $offres=Categorie_offre::all();
    $types=type_projet::all();
    $view->with(compact('offres','types'));
   
});
View::composer('modification.offre', function($view){
   
   $offres=Categorie_offre::all();
    $view->with(compact('offres'));
   
});
View::composer('creation.offre', function($view){
  
   $offres=Categorie_offre::all();
    $view->with(compact('offres'));
   
});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
