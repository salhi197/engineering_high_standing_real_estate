@extends('layouts.master')
@section('title', 'Accueil')
@section('content')

        <header class="header-area bg-1 sticky-menu" id="sticky-header">
        <div class="container">
            <div class="row">
                 <div class="col-lg-2 col-md-12 col-sm-10 col-6">
                    <div class="logo">
                        <a href="/"><img class="logo1" src="images/logo-alco-3i.svg" alt="3i group"></a>
                    </div>
                </div>
                <div class="col-lg-10 d-none d-lg-block">
                    <div class="mainmenu">
                        <ul id="navigation">
                            <li class="active"><a href="/">Accueil</a>
                                
                            </li>
                            <li><a href="#">Présentation <i class="fa fa-angle-down"></i></a>
                                  <ul>
                                    <li><a href="/about">Qui sommes-nous</a></li>
                                    <li><a href="/standards">Nos standards</a></li>
                                    <li><a href="/fondateur">Mot du fondateur</a></li>
                                </ul>
                            </li>
                            <li><a href="/nos-projets">Nos Projets </a>
                            </li>
                            <li><a href="/nouveau-projets">Nos offres exceptionnelles</a>
                                
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
    <!-- header-area end -->
    <!-- slider-area start -->
 <div class="slider-area">
        <div class="slider-active next-prev-style">
            @foreach($Sliders as $slider )
            <div class="slider-items">
                <img src="image/{{$slider->image}}" alt="" class="slider">
                <div class="slider-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="slider-text">
                                    <div class="line"></div>
                                    <h2><span class="d-block">Résidence</span>   <span class="color">{{$slider->titre}}</span> </h2>
                                    <p>{!! $slider->text !!} </p>
                                    <a href="projets/voir/{{$slider->projet_id}}">Voir le Projet <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           @endforeach
            
        </div>
    </div>
    <!-- slider-area end -->
    <!-- ablout-area start -->
<div class="service-area bg-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2>Nos Projets</h2>
                        <h3>Une architecture moderne et épurée, des résidences dotées de tous les éléments de haut standing offrant une qualité irréprochable, un confort optimal et une sécurité intégrale</h3>
                    </div>
                </div>
            </div>
            <div class="row">
          

                  @if(isset($projets))
                @foreach($projets as $projet)
                <?php 

$l=$projet->photos->first();
 
 $l=$l->nom;
 


 ?>
                     <div class="col-sm-6 col-12 col-lg-4 ">
                    <div class="service-wrap box1">
                         <a href="projets/voir/{{$projet->id}}">
                        <div class="service-img  radius-left ">
                              
                            @if($projet->offre!=null)
                           
                            @if((new DateTime() < new DateTime($projet->offre->date_fin)))
                             @if((new DateTime() > new DateTime($projet->offre->date_debut)))
                    
   <div class="ribbon"><span>{{$projet->offre->type}}</span></div>

                            @endif
                            @endif 
                            @endif
                           
                            <img  src="image/{{$l}}" alt="">
                        

                        </div>
                    </a>
                        <div class="service-content p">
                           <a class="titre" href="projets/voir/{{$projet->id}}"> <h4>{{$projet->nom}} </h4></a>
                            <?php  if (strlen($projet->description) > 160)
                    {
                      
                     $morceau = substr($projet->description,0,161).'...';
                     } else 
                  {$morceau=$projet->description;}
                      
                     ?>
                            <p>{!!$morceau!!}</p>
                            <a href="projets/voir/{{$projet->id}}">plus de détails</a>
                        </div>
                    </div>
                     @if($projet->type=='Traveaux en cours')
                    <span class="label on-sale trav">Travaux en cours</span>
                    @endif
                    @if($projet->type=='Nouveau')
                    <span class="label on-sale">Nouveau</span>
                    @endif
                     
                    @if($projet->type=='Dèrniere opportunite')
                    <span class="label on-sale oppo">Dèrniere opportunite</span>
                    @endif
                      @if($projet->type=='Livraison Immédiate')
                    <span class="label on-sale liv">Livraison Immédiate</span>
                    @endif
                     
                  
                </div>
                 
               @endforeach
                 @endif
              
                

               
               
               
                   

               
               
               
                     
             
              
            </div>
        </div>
    </div>



<div class="spacial-area ptb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2>Nos Standards</h2>
                        <h3>Pour votre confort et votre sécurité, nos appartements bénéficient d’un bâti de qualité.</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 d-lg-block d-none ">
                                        <div class="about-page-wrap">
                         <div class="about-page-active next-prev-style">
                        
                            <div class="about-page-img">
                                <img src="images/nos-standards/sejour-op.jpg" alt="">
                            </div>
                            <div class="about-page-img">
                                 <img src="images/nos-standards/dinning-op.jpg" alt="">
                            </div>
                             <div class="about-page-img">
                                <img src="images/nos-standards/sejour-op2.jpg" alt="">
                            </div>
                            <div class="about-page-img">
                                 <img src="images/nos-standards/piscine-op.jpg" alt="">
                            </div>
                           <div class="about-page-img">
                                 <img src="images/nos-standards/salle-de-sport-op.jpg" alt="">
                            </div>
                             <div class="about-page-img">
                                 <img src="images/nos-standards/sejour-f4-op.jpg" alt="">
                            </div>        
                           
                        </div>
           </div>
                </div>
<div class="col-lg-6 col-12">
                    <div class="spacial-wrap">
                        <div class="row">
                          
                                <div class="col-md-6 col-sm-6 col-12">
                                <div class="spacial-item">
                                    <a id="1" href="/standards#securite"> <span class="flaticon-house-3"></span></a>
                               <a id="1" href="/standards#securite">    <h4>Sécurité</h4> </a>
                                </div>
                            </div>
                            
                           
                           
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="spacial-item">
                                    <a id="1"  href="/standards#confort">  <span class="flaticon-house"></span></a>
                                   <a id="1" href="/standards#confort">  <h4>Confort</h4></a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="spacial-item">
                                    <a id="1"  href="/standards#esthetique"><span class="flaticon-cityscape"></span></a>
                                  <a id="1" href="/standards#esthetique"> <h4>Esthétique</h4></a> 
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="spacial-item">
                                    <a id="1"  href="/standards#fonctoinnalite">  <span class="flaticon-house-1"></span></a>
                                   <a id="1" href="/standards#fonctoinnalite"> <h4>Fonctionnalité</h4></a> 
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
  
  



    
     
@endsection