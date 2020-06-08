@extends('layouts.master')
@section('title', 'Nouveaux Projets')
@section('content')

     
        <!-- header-area start -->
         <header class="header-area bg-1 sticky-menu" id="sticky-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-10 col-sm-8 col-6">
                    <div class="logo">
                        <a href="/"><img src="images/logo-alco-3i.svg" alt=""></a>
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
                            <li ><a href="/nos-projets">Nos Projets </a>
                            </li>
                            <li class="active"><a href="/nouveau-projets">Nos offres exceptionnelles</a>
                                
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
                        <h2>Nos offres exceptionnelles</h2>
                        <ul>
                            <li><a href="/">Accueil</a></li>
                            <li>-</li>
                            <li> Offres exceptionnelles</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcumb-area end -->
    <!-- ablout-area start -->
<div class="service-area bg-2">
        <div class="container">
            <div class="row">
                 @if(isset($projets))
                @foreach($projets as $projet)
                 <div class="col-sm-6 col-12 col-lg-4">
                    <div class="service-wrap">
                         <a href="projets/voir/{{$projet->id}}">
                        <div class="service-img  radius-left">
                          
<?php 
$listPhoto=$projet->photos;
$list=array();
foreach ($listPhoto as $photo) {
 $list[]=$listPhoto->first();
}
foreach($list as $l)
{
 $l=$l->nom;
 
}

 ?>
  @if($projet->offre!=null)
                           
                            @if((new DateTime() < new DateTime($projet->offre->date_fin)))
                             @if((new DateTime() > new DateTime($projet->offre->date_debut)))
                    
   <div class="ribbon"><span>{{$projet->offre->type}}</span></div>

                            @endif
                            @endif 
                            @endif
 
 
                            <img src="image/{{$l}}" alt="">
                           
                        </div>
                    </a>
                        <div class="service-content p">
                           <a class="titre" href="projets/voir/{{$projet->id}}">  <h4>{{$projet->nom}}</h4> </a>
                             <?php  if (strlen($projet->description) > 160)
                    {
                      
                     $morceau = substr($projet->description,0,161).'...';
                     } else 
                  {$morceau=$projet->description;}
                      
                     ?>
                            <p>{!!$morceau!!}</p>
                            <a  href="projets/voir/{{$projet->id}}" >plus de détails</a>
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
    
  
    
     
@endsection
