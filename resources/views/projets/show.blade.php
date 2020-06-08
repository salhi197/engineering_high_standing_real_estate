@extends('layouts.master')
@section('title','Projet '.$projet->nom)
@section('content')

     
        <!-- header-area start -->
         <header class="header-area bg-1 sticky-menu" id="sticky-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-10 col-sm-8 col-6">
                    <div class="logo">
                 <a href="/"><img class="logo1" src="/images/logo-alco-3i.svg" alt="3i group"></a>
                    </div>
                </div>
                <div class="col-lg-10 d-none d-lg-block">
                    <div class="mainmenu">
                        <ul id="navigation">
                            <li ><a href="/">Accueil</a>
                                
                            </li>
                            <li><a href="#">Présentation <i class="fa fa-angle-down"></i></a>
                                  <ul>
                                    <li><a href="/about">Qui sommes-nous</a></li>
                                    <li><a href="/standards">Nos standards</a></li>
                                    <li><a href="/fondateur">Mot du fondateur</a></li>
                                </ul>
                            </li>
                            <li ><a <?php if ($projet->type!='Nouveau') { ?> class="active" <?php } ?> href="/nos-projets">Nos Projets </a>
                            </li>
                            <li <?php if ($projet->type=='Nouveau') { ?>class="active" <?php } ?>><a href="/nouveau-projets">Nos offres exceptionnelles</a>
                                
                            </li>
                             <li><a href="/actualite">Actualités</a></li>
                            <li><a href="/carriere">Carrière</a></li>
                       
                            <li><a href="/contact">Contact</a></li>
                            
                        </ul>
                    </div>
                </div>
             
                <div class="col-md-1 col-sm-1 col-2 d-lg-none d-sm-block">
                    <div class="responsive-menu-wrap floatright"></div>
                </div>
            </div>
        </div>
    </header>
   
    
    <div class="breadcumb-area black-opacity bg-img-6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap">
                        <h2>Residence {{$projet->nom}}</h2>
                        <ul>
                            <li><a href="/">Accueil</a></li>
                            <li>-</li>
                           @if($projet->type=='Livraison Immédiate') 
                           <li>Projets Achevés</li>
                           @else 
                           <li> PROJETS EN COURS</li>
                           @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcumb-area end -->
    <div class="about-page-area ptb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="about-page-wrap">
                        <h2>{{$projet->nom}}</h2>
                         <div class="about-page-active next-prev-style">
                         <?php unset($projet->photos[0]); ?> 
                        @foreach($projet->photos as $photo)
                            <div class="about-page-img">
                                <img src="/image/{{$photo->nom}}" alt="">
                            </div>
                            @endforeach
                            
                            
                        </div>

                 <!-- <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injtyt ected humour randomised words which don't look even slightly believable. If you are going tpaage of Lorem Ipsum, you need to be sure there isn't anything embarrassing. -->
                    <div class="caract">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class=""><a href="#home" aria-controls="home" role="tab" data-toggle="tab" class="active" aria-selected="false">Description</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" class="" aria-selected="false">Appartements</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab" class="" aria-selected="false">Parties Communes</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab" class="" aria-selected="true">Commodités</a></li>
     <li role="presentation"><a href="#parking" aria-controls="parking" role="tab" data-toggle="tab" class="" aria-selected="true">Parking</a></li>
      
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">{!!$projet->description!!}



    </div>
    <div role="tabpanel" class="tab-pane" id="profile">{!!$projet->appartements!!}</div>
    <div role="tabpanel" class="tab-pane" id="messages">

    
{!!$projet->partieC!!}

</div>
    <div role="tabpanel" class="tab-pane" id="settings"><strong>Sécurité</strong> : <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;Résidence sécurisée avec contrôle d'accès automatique. <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;Surveillance 24h/24. <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;Vidéo-surveillance permanente. <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;Système de visiophonie. <br>
     <strong>Confort</strong> : <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;<font color="#28a745">Ascenseurs</font> :de qualité supérieure-fournisseur leader mondial.<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;Dernière technologie avec finitions irréprochables.<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;<font color="#28a745">Menuiserie</font> : portes en bois massif et MDF hydrofuge.<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;Fenêtres : en aluminium aux caractéristiques d'isolation phonique et acoustique permettant d'offrir un confort optimal.<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;<font color="#28a745">Volets roulants</font> : dans tous les espaces sauf la cuisine.<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;<font color="#28a745">Climatisation</font> : pré-installation.<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;<font color="#28a745">Chauffage</font>  : central ave radiateurs dans chaque chambre.<br>
    <strong>Esthétique</strong> : <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;<font color="#28a745">Revêtements de sol</font> : marbre dans les Appartements et dalle de sol anti-dérapante dans les salles de bain .<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;<font color="#28a745">Balcons</font> : en dalle de sol spéciale extérieur anti-dérapante et anti UV.<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;<font color="#28a745">Revêtements muraux</font> : faîence de 1er choix dans les salles de bain.<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;<font color="#28a745">Revêtements de façade</font> : soigeuseuement choisis.<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;Peinture intérieure et extérieure : étanche, auto-lavante et résistante.<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;<font color="#28a745">Garde-corps</font> : en verre sur la façade principale et métallique sur les autres.<br>
    <strong>Fonctionalité</strong> : <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;<font color="#28a745">Cuisines</font> : équipées<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;Electromnégaer fourni : plauqe de cuisson, four et hotte<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;&nbsp;<font color="#28a745">Rinbinetterie</font> : marque de renomée internationale.<br>



       


</div>
 <div role="tabpanel" class="tab-pane" id="parking">{!!$projet->parking!!}

</div>


  </div>

</div>


    
            
                    </div>
                </div>
                 <div class="col-lg-4 col-md-6">
                    <div class="about-sidebar">
                        <h3>NOS STANDARDS</h3>
                           <div class="about-page-active next-prev-style">
                        
                            <div class="about-page-img">
                                <img src="/images/nos-standards/sejour-op.jpg" alt="">
                            </div>
                            <div class="about-page-img">
                                 <img src="/images/nos-standards/dinning-op.jpg" alt="">
                            </div>
                             <div class="about-page-img">
                                <img src="/images/nos-standards/sejour-op2.jpg" alt="">
                            </div>
                          
                           <div class="about-page-img">
                                 <img src="/images/nos-standards/salle-de-sport-op.jpg" alt="">
                            </div>
                             <div class="about-page-img">
                                 <img src="/images/nos-standards/sejour-f4-op.jpg" alt="">
                            </div>
                            
                            
                            
                        </div>
                      
                        <div class="maps">
                            <h3>LOCALISATION DU PROJET </h3>
             
<iframe src="{{$projet->localisation}}" width="350" height="254" frameborder="0" style="border:0" allowfullscreen></iframe>     
   </div>

@if($projet->video !=null)
<br> <br>
   <video width="350" height="254" controls>
  <source src="/image/{{$projet->video}}" type="video/mp4">

  Your browser does not support the video tag.
</video>
@endif
                   @if($projet->pourcentage>0)
                    <div class="button-avancement">
                        <!-- Indicates a successful or positive action -->
                           <a class="btn btn-success" href="#etat-davancement">Voir l'etat d'avancement du projet</a>
                       </div>
                      @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    

   @if($projet->pourcentage>0)   
<div id='etat-davancement' class="about-area3 ptb-120">
        <div class="container">
         <div class="section-title text-center">
                        <h2>Etat d'avancement du projet</h2>
                        <h3>Mise à jour le {{date('d/m/Y', strtotime($projet->updated_at))}}</h3>
                    </div>
         <div class="row">
               <div class="col-lg-6">
      <div class="row">
        <div class="col-lg-3">
               <div class="progress progress-bar-vertical" >
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: {{$projet->pourcentage}}%;">
   
  </div>

</div> 
</div>
<div class="col-lg-3">
<H1>{{$projet->pourcentage}}% </H1>
</div>
                </div>
              </div>

                <div class="col-lg-6">
                    <div class="about-page-wrap">
                         <div class="about-page-active next-prev-style">
                         @foreach($projet->photos_etats as $photo2)
                            <div class="about-page-img">
                                <img src="/image/{{$photo2->nom}}" alt="">
                            </div>
                            @endforeach
                          
                         
                          
                                                     
                           
                        </div>

                   </div>
                 </div>
       

        </div>
           
        
        </div>
    </div>
    
  @endif 
  

     
@endsection
