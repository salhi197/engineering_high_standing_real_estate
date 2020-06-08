<?php
Route::get('/clear', function () {
    $clearcache = Artisan::call('cache:clear');
    echo "Cache cleared<br>";

    $clearview = Artisan::call('view:clear');
    echo "View cleared<br>";

    $clearconfig = Artisan::call('config:cache');
    echo "Config cleared<br>";

});
//home 
Route::get('/', 'projetsController@index')->name('home');
Route::get('/about', 'Controller@about');
Route::get('/standards', 'Controller@standards');
Route::get('/fondateur', 'Controller@fondateur');
Route::get('/nos-projets', 'Controller@nosProjets');
Route::get('/nouveau-projets', 'Controller@nouveauProjets');
Route::get('/carriere', 'Controller@carriere');
Route::get('/contact', 'Controller@contact');
Route::get('/actualite', 'Controller@actualiteIndex');
//la manipulation des articles
Route::get('/actualite/{article}', 'ArticleController@show');
Route::post('/ajouterArticle', 'ArticleController@ajouter');
Route::get('/article/ajouter', 'ArticleController@create');//voir formulaire
Route::get('article/supprimer/{article}', 'ArticleController@delete');
Route::get('article/modifier/{article}', 'ArticleController@update');

Route::post('/modifierArticle/{article}', 'ArticleController@modifier');
Route::get('/image/{fileimage}', 'ArticleController@getimage');//image des artilces
Route::get('/actualite/artilce/{article}', 'ArticleController@getArtilce');

//la manipulation des utlisateurs
Route::post('/register', 'RegistrationController@store');// enregister

Route::get('/users/ajouter', 'RegistrationController@create');
Route::get('/register' ,function () {
    return view('registration.create');
});

Route::get('/user/modification/{user}', 'UsersController@getUser');
Route::post('/user/modification/{user}', 'UsersController@update');
Route::get('/users/bloquer/{user}', 'UsersController@bloquer');
Route::get('/users/Debloquer/{user}', 'UsersController@debloquer');
//reseaux
Route::get('/contact/Reseaux', 'UsersController@Reseaux');
Route::get('/reseau/ajouter', 'UsersController@NewReseaux');
Route::post('/ajouterReseau', 'UsersController@NewReseaux2');
Route::get('/reseau/supprimer/{reseau}', 'UsersController@deleteReseau');
Route::get('/reseau/modifier/{reseau}', 'UsersController@updateReseau');
Route::post('/ModifierReseau/{reseau}', 'UsersController@updateReseau2');

Route::get('/glMB+b1NQwPacsqOanrZ8iIdY37m0w3e7scvUddBY', 'SessionsController@create')->name('login');; //pour login
Route::Post('/login', 'SessionsController@store'); //create e new session
Route::get('user/supprimer/{user}', 'UsersController@delete');



Route::get('/logout', 'SessionsController@destroy'); 
// les page de l'utilisateur
Route::get('/home', 'UsersController@index');
Route::get('/projets', 'UsersController@projets');
Route::get('/offrreExceptoinnelles', 'UsersController@offreExceptionnelles');
Route::get('/articles', 'UsersController@articles');
Route::get('/nos-standards', 'UsersController@NoStandards');
Route::get('/users', 'UsersController@users');
Route::get('/historique', 'UsersController@historique');

Route::get('/newsletter', 'UsersController@newsletter');
// les  telephones
Route::get('/contact/telephones', 'UsersController@telephones');
Route::get('/telephone/ajouter', 'UsersController@ajoutelephone');
Route::post('/ajouterTelephone', 'UsersController@ajout2elephone');
Route::get('/telephone/supprimer/{telephone}', 'UsersController@deleteTelephone');
Route::get('/telephone/modifier/{telephone}', 'UsersController@updateTelephone');
Route::post('/ModifierTelephone/{telephone}', 'UsersController@updateTelephone2');
//emails
Route::get('/contact/emails', 'UsersController@emails');
Route::get('/email/ajouter', 'UsersController@ajoutemail');
Route::post('/ajouterEmail', 'UsersController@ajoutemail2');
Route::get('/email/supprimer/{email}', 'UsersController@deletemail');



Route::get('/email/modifier/{email}', 'UsersController@updateEmail');
Route::post('/ModifierEmail/{email}', 'UsersController@updateEmail2');
//  les adressses
Route::get('/contact/adresse', 'UsersController@adresses');
Route::get('/adresse/ajouter', 'UsersController@ajouteadresses');
Route::post('/ajouterAdresse', 'UsersController@ajouteadresses2');
Route::get('/adresse/supprimer/{adresse}', 'UsersController@deleteAdresse');
Route::get('/adresse/modifier/{adresse}', 'UsersController@updateAdresse');
Route::post('/ModifierAdresse/{adresse}', 'UsersController@updateAdresse2');
//faxs
Route::get('/contact/faxs', 'UsersController@faxs');
Route::get('/fax/ajouter', 'UsersController@ajoutefax');
Route::post('/ajouterFax', 'UsersController@ajoutefax2');
Route::get('/fax/supprimer/{fax}', 'UsersController@deletefax');
Route::get('/fax/modifier/{fax}', 'UsersController@updatefax');
Route::post('/ModifierFax/{fax}', 'UsersController@updatefax2');
//
Route::get('/standards/modifier/{standard}', 'StandardController@updateStandard');
Route::post('/modifierStandards/{standard}', 'StandardController@update');
//page de manipulation des projets 

//Offre

Route::get('/ajouterOfrre/{projet}', 'UsersController@NouveauOffre');
Route::post('/offre/ajouter', 'UsersController@NouveauOffre2');

Route::get('/modifier/offre/{projet}', 'UsersController@updateOffre');
Route::post('/offre/modifier/{offre}', 'UsersController@updateOffre2');
Route::get('/supprime/offre/{projet}', 'UsersController@deleteOffre');
//
Route::get('/projets/ajouter', 'projetsController@ajouter');
Route::post('/projets/ajouter', 'projetsController@nouveau');
Route::get('/projets/supprimer/{projet}', 'projetsController@delete');
Route::get('/projets/modifier/{projet}', 'projetsController@update');
Route::post('/updatepostion', 'projetsController@updatepostion');
Route::post('/modifierProjet/{projet}', 'projetsController@updateProjet');
//voir les projets plus detailler 
Route::get('projets/voir/{projet}', 'projetsController@show');
//commentaire*
Route::post('/commentaire/{article}', 'CommentaireController@store');
Route::get('/CompteModifier/{user}', 'UsersController@getUser2');
//envoi de email
Route::post('/contact', 'MessageController@PostMessage');
Route::post('/carriere', 'MessageController@PostMessage2');
//historique information
Route::get('/information/{historique}', 'UsersController@information');
//
Route::post('/newletterEmail', 'MessageController@newsletter');
Route::get('/newlettre/{message}', 'MessageController@newsletterdelete');

Route::get('/supprimerPhoto1/{photo}', 'projetsController@deletePhoto1');
Route::get('/supprimerPhoto2/{photo}', 'projetsController@deletePhoto2');

//sliders
Route::get('/slider/projets', 'UsersController@sliderprojet');
Route::get('/slider/articles', 'UsersController@sliderarticle');
Route::get('/SliderP/ajouter', 'UsersController@createP');
Route::get('/SliderA/ajouter', 'UsersController@createA');
Route::post('/ajouterSlider', 'UsersController@createSlider');
Route::get('/SlidersA/supprimer/{slider}', 'UsersController@suppSlider');
Route::get('/SlidersP/supprimer/{slider}', 'UsersController@suppSlider');
Route::get('/SlidersP/modifier/{slider}', 'UsersController@updateSlider');
Route::get('/SlidersA/modifier/{slider}', 'UsersController@updateSlider');
Route::post('/modificationSlider/{slider}', 'UsersController@updateSlider2');
