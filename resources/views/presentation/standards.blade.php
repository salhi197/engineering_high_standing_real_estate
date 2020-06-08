@extends('layouts.master')
@section('title', 'A Propos')
@section('content')

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
                            <li class="active"><a href="#">Présentation <i class="fa fa-angle-down"></i></a>
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
              <div class="col-lg-1 col-md-2 col-sm-3 col-4">
                    <div class="search-wrapper">
                        <ul>
                            <li>
                                <ul>
                                    <li>
                                        <form action="#">
                                            <input type="text" placeholder="Search Here...">
                                            <button><i class="fa fa-search"></i></button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
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
    <!-- breadcumb-area start -->
     <div class="breadcumb-area black-opacity bg-img-6">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap">
                        <h2>Présentation</h2>
                        <ul>
                            <li><a href="/">Accueil</a></li>
                            <li>-</li>
                            <li>Nos Standards</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<div class="blog-area blog-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                       <div class="blog-wrap">
                        <div class="blog-img">
                            <img src="images/nos-standards/standards.jpg" alt="">
                        </div>
                        <div class="blog-content">
                            
                            <h4>Nos Standards : </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                 
                    <div class="blog-details-wrap">
                        <p>
<strong id="securite" style="color: #279940">Sécurité</strong> :<br>
  {!! $standards->securite !!}
  <br>
     <strong id="confort" style="color: #279940">Confort</strong> : <br>
        {!!  $standards->confort !!}
        <br>
    <strong id="esthetique" style="color: #279940">Esthétique</strong> : <br>
     {!!  $standards->esthetique !!}
     <br>
    <strong id="fonctoinnalite" style="color: #279940">Fonctionnalité</strong> : <br>
           {!!  $standards->fonctoinnalite !!}


    </p>

                      
                    </div>
                </div>
        
            </div>
        </div>
    </div>



@endsection
            